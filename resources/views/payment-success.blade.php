<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Success</title>

    {{-- Import CSS build dari Vite (Tailwind dan file lainnya yang ada di resources/css/app.css) --}}
    @vite(['resources/css/app.css'])

    {{-- CDN Tailwind (backup styling jika build vite belum berhasil) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    {{-- Konten utama halaman --}}

    <div class="text-center mt-5">
        {{-- Informasi bahwa pembayaran sedang diproses --}}
        <h2>Pembayaran Anda sedang diproses...</h2>
        <p>Mohon tunggu sebentar, Anda akan diarahkan ke halaman Booking secara otomatis.</p>

        {{-- Spinner animasi loading (opsional: bisa diganti pakai animasi dari Tailwind) --}}
        <div class="spinner-border text-primary mt-3" role="status">
            <span class="visually-hidden">Loading...</span> {{-- Untuk screen reader --}}
        </div>
    </div>

    <script>
        // Fungsi redirect otomatis ke halaman "Booking Now"
        // Proses ini terjadi 3 detik setelah halaman tampil
        setTimeout(function() {
            window.location.href = "{{ route('booking-now.index') }}";
        }, 3000);
    </script>
</body>
</html>
