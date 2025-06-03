<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Tiket Pesawat</title>
  @vite(['resources/css/app.css'])
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.client_key')}}"></script>

</head>
<body class="bg-[#FAF3E0] min-h-screen p-4">
  <div class="max-w-sm mx-auto bg-white rounded-2xl shadow-lg p-6 space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-center">
      <h1 class="text-lg font-semibold">Checkout</h1>
      <div></div> <!-- Biar header tetap center -->
    </div>

    <!-- Order Summary -->
    @php
    $adminFee = $flight->price * 0.02;
    $totalPrice = $flight->price + $adminFee;
    @endphp

    <div class="bg-gray-50 p-4 rounded-lg space-y-2">
    <div class="flex justify-between text-sm">
        <span>Ticket Price</span>
        <span>Rp{{ number_format($flight->price, 0, ',', '.') }}</span>
    </div>
    <div class="flex justify-between text-sm">
        <span>Admin Fee 2%</span>
        <span>Rp{{ number_format($adminFee, 0, ',', '.') }}</span>
    </div>
    <div class="border-t my-2"></div>
    <div class="flex justify-between font-semibold">
        <span>Total</span>
        <span>Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
    </div>
    </div>

    <!-- Confirm Message -->
    <div class="text-xs text-gray-500">
      Please confirm and submit your booking<br>
      <span class="text-[10px]">By clicking submit, you agree to Terms and Conditions</span>
    </div>

    <!-- Passenger Info -->
    <div class="bg-gray-50 p-4 rounded-lg">
      <div class="flex justify-between items-center mb-2">
        <span class="font-semibold text-sm">Passenger Details</span>
      </div>
      <div class="text-sm space-y-1">
        <div>{{ $flight->airline }}</div>
        <p class="text-sm text-gray-700">{{ $flight->departure }} → {{ $flight->destination }}</p>
      </div>
    </div>

    <div class="flex gap-4">
        <form action="{{ route('payment.cancel', $booking->id) }}" method="POST" class="flex-1">
            @csrf
            <button type="submit"
                onclick="return confirm('Apakah kamu yakin ingin membatalkan transaksi ini?')"
                class="w-full bg-gray-400 text-white py-3 rounded-xl font-semibold hover:opacity-90 transition">
                Cancel
            </button>
        </form>

        <div class="flex-1">
            <button id="pay-button"
                class="w-full text-white py-3 rounded-xl font-semibold hover:opacity-90 transition"
                style="background-color: #7D0A0A;">
                Pay
            </button>
        </div>
    </div>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <script>
        const grossAmount = {{ (int) $totalPrice }};
        const itemDetails = {!! json_encode([
            [
                'id' => $flight->id,
                'price' => (int) $flight->price,
                'quantity' => 1,
                'name' => $flight->flight_number,
            ],
            [
                'id' => 'admin-fee',
                'price' => (int) $adminFee,
                'quantity' => 1,
                'name' => 'Biaya Aplikasi (2%)',
            ]
        ]) !!};

        const bookingId = {{ $booking->id }};
    </script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            const payButton = document.getElementById('pay-button');

            @if(isset($snapToken))
            payButton.addEventListener('click', function () {
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        // Kirim tambahan data gross_amount dan item_details secara manual
                        const additionalData = {
                            gross_amount: grossAmount,
                            item_details: itemDetails
                        };

                        const payload = {...result, ...additionalData};

                        fetch("{{ route('midtrans.callback') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({...payload, booking_id: bookingId})
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log("Callback processed:", data);
                            alert("Pembayaran sukses!");
                            setTimeout(() => {
                                window.location.href = "{{ route('booking-now.index') }}";
                            }, 1000);
                        })
                        .catch(error => {
                            console.error("Error saat kirim ke backend:", error);
                        });
                    },
                    onPending: function(result) {
                        alert("Pembayaran masih pending.");
                    },
                    onError: function(result) {
                        alert("Pembayaran gagal.");
                        console.error(result);
                    }
                });
            });
            @else
                console.error('snapToken not found!');
            @endif
        });
    </script>
  </div>
</body>

</html>
