<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Midtrans\Snap;
use App\Models\Booking;
use App\Models\Payment;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function pay($id)
    {
        $booking = Booking::with('flight')->findOrFail($id);

        // Cegah pembayaran ulang
        if ($booking->status !== 'pending') {
            return redirect()->route('booking.now')->with('error', 'Booking sudah diproses.');
        }

        $flight = $booking->flight;
        $adminFee = round($flight->price * 0.02);
        $totalPrice = $flight->price + $adminFee;

        // Buat order_id
        $orderId = 'ORDER-' . $booking->id . '-' . time();
        $transactionId = 'TRX-' . time() . '-' . $booking->id;

        // Simpan order_id ke bookings
        $booking->update([
            'order_id' => $orderId,
            'status' => 'pending', // sebetulnya udah pending, tapi biar aman
        ]);

        // Simpan ke payments
        Payment::create([
            'booking_id'  => $booking->id,
            'order_id'    => $orderId,
            'transaction_id' => $transactionId,
            'payment_type'   => 'onprogress',
            'amount'      => $totalPrice,
            'status'      => 'pending',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Buat Snap Token
        $snapToken = Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalPrice,
            ],
            'item_details' => [
                [
                    'id' => $flight->id,
                    'price' => $flight->price,
                    'quantity' => 1,
                    'name' => $flight->flight_number,
                ],
                [
                    'id' => 'admin-fee',
                    'price' => $adminFee,
                    'quantity' => 1,
                    'name' => 'Biaya Aplikasi (2%)',
                ],
            ],
            'customer_details' => [
                'first_name' => 'John',
                'email' => 'john@example.com',
                'phone' => '08123456789',
            ],
        ]);

        return view('payment', compact('booking', 'flight', 'adminFee', 'totalPrice', 'snapToken'));
    }


    public function callback(Request $request)
    {
        $orderId = $request->input('order_id');
        $parts = explode('-', $orderId);

        if (count($parts) < 3) {
            return response()->json(['error' => 'Invalid order_id format'], 400);
        }

        $bookingId = $parts[1];
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }

        // Update hanya status dan payment_type di tabel payments
        Payment::where('booking_id', $booking->id)->update([
            'status'       => $request->input('transaction_status'),
            'payment_type' => $request->input('payment_type'),
        ]);

        // Update status booking
        if (in_array($request->transaction_status, ['settlement', 'capture'])) {
            $booking->update(['status' => 'ongoing']);
        } elseif (in_array($request->transaction_status, ['cancel', 'deny', 'expire'])) {
            $booking->update(['status' => 'cancelled']);
        }

        return response()->json(['message' => 'Callback processed successfully']);
    }


    public function paymentSuccess()
    {
        return view('payment-success');
    }

}
