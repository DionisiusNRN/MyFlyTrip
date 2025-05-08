<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Tiket Pesawat</title>
  @vite(['resources/css/app.css'])
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FAF3E0] min-h-screen p-4">

  <div class="max-w-sm mx-auto bg-white rounded-2xl shadow-lg p-6 space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
      <button class="text-sm text-gray-500">Cancel</button>
      <h1 class="text-lg font-semibold">Checkout</h1>
      <div></div> <!-- Biar header tetap center -->
    </div>

    <!-- Order Summary -->
    <div class="bg-gray-50 p-4 rounded-lg space-y-2">
      <div class="flex justify-between text-sm">
        <span>Ticket Price</span>
        <span>$150.00</span>
      </div>
      <div class="flex justify-between text-sm">
        <span>Admin Fee</span>
        <span>$9.90</span>
      </div>
      <div class="border-t my-2"></div>
      <div class="flex justify-between font-semibold">
        <span>Total</span>
        <span>$159.90</span>
      </div>
    </div>

    <!-- Confirm Message -->
    <div class="text-xs text-gray-500">
      Please confirm and submit your booking<br>
      <span class="text-[10px]">By clicking submit, you agree to Terms and Conditions</span>
    </div>

    <!-- Payment Info -->
    <div class="bg-gray-50 p-4 rounded-lg">
      <div class="flex justify-between items-center mb-2">
        <span class="font-semibold text-sm">Payment Method</span>
        <button class="text-red-500 text-sm">Edit</button>
      </div>
      <div class="flex items-center justify-between text-sm">
        <div class="flex items-center space-x-2">
          <div class="w-8 h-6 bg-orange-400 rounded-sm"></div> <!-- fake card icon -->
          <span>**** 6522</span>
        </div>
        <span>07/23</span>
      </div>
    </div>

    <!-- Passenger Info -->
    <div class="bg-gray-50 p-4 rounded-lg">
      <div class="flex justify-between items-center mb-2">
        <span class="font-semibold text-sm">Passenger Details</span>
        <button class="text-red-500 text-sm">Edit</button>
      </div>
      <div class="text-sm space-y-1">
        <div>Hikmet Ateşken</div>
        <div>Flight: NYC → LAX</div>
      </div>
    </div>

    <!-- Submit Button -->
    <button class="w-full text-white py-3 rounded-xl font-semibold hover:opacity-90 transition" style="background-color: #7D0A0A;">
      Submit Booking
    </button>

  </div>

</body>
</html>
