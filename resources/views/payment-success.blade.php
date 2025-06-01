<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="text-center mt-5">
        <h2>Pembayaran Anda sedang diproses...</h2>
        <p>Mohon tunggu sebentar, Anda akan diarahkan ke halaman Booking secara otomatis.</p>

        <div class="spinner-border text-primary mt-3" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script>
        // Delay 3 detik lalu redirect ke halaman booking
        setTimeout(function() {
            window.location.href = "{{ route('booking-now.index') }}";
        }, 3000);
    </script>
</body>
</html>

