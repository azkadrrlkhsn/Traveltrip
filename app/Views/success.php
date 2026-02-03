<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Berhasil! - Tripio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-3xl shadow-xl max-w-md w-full text-center relative overflow-hidden m-4">
        
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#4FC3F7] to-[#C19A6B]"></div>

        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i data-lucide="check" class="w-12 h-12 text-green-600"></i>
        </div>

        <h1 class="text-2xl font-bold text-slate-800 mb-2">Booking Berhasil!</h1>
        <p class="text-slate-500 text-sm mb-8 leading-relaxed">
            Terima kasih telah memesan bersama Tripio.<br>
            E-Ticket telah dikirim ke email Anda.
        </p>

        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 mb-8 text-left relative">
            <div class="flex justify-between items-center mb-2">
                <span class="text-[10px] text-slate-400 uppercase font-bold">Booking ID</span>
                <span class="text-xs font-mono text-slate-800">TRP-<?= rand(1000,9999) ?></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-[10px] text-slate-400 uppercase font-bold">Status</span>
                <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded-full">CONFIRMED</span>
            </div>
            <div class="absolute -left-2 top-1/2 w-4 h-4 bg-white border-r border-gray-200 rounded-full -translate-y-1/2"></div>
            <div class="absolute -right-2 top-1/2 w-4 h-4 bg-white border-l border-gray-200 rounded-full -translate-y-1/2"></div>
        </div>

        <div class="space-y-3">
            <a href="<?= base_url('/') ?>" class="block w-full bg-[#5C4033] text-white font-bold py-4 rounded-xl shadow-lg hover:bg-black transition active:scale-95">
                Kembali ke Beranda
            </a>
            <a href="<?= base_url('booking/history') ?>" class="block w-full bg-white text-slate-500 font-bold py-4 rounded-xl border border-gray-100 hover:bg-gray-50 transition text-sm text-center">
            Lihat Riwayat Pesanan
            </a>
        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>