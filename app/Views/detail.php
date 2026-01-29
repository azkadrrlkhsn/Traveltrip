<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $tour['name'] ?> - Tripio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-slate-800">

    <div class="block md:hidden min-h-screen bg-gray-50 pb-8">
        
        <div class="px-6 pt-8 pb-4 flex justify-between items-center bg-white shadow-sm sticky top-0 z-50">
            <a href="<?= base_url('/') ?>" class="p-2 -ml-2 rounded-full hover:bg-gray-100">
                <i data-lucide="arrow-left" class="w-6 h-6 text-slate-800"></i>
            </a>
            <h1 class="text-lg font-bold text-slate-800">Flight Ticket</h1>
            <i data-lucide="more-horizontal" class="w-6 h-6 text-slate-800"></i>
        </div>

        <div class="p-6">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden relative">
                <div class="h-48 overflow-hidden">
                    <img src="<?= $tour['image_url'] ?>" class="w-full h-full object-cover">
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <p class="text-xs text-slate-400 uppercase">From</p>
                            <h3 class="text-xl font-bold">CGK</h3>
                            <p class="text-[10px] text-slate-500">Jakarta</p>
                        </div>
                        <div class="flex-1 px-4 flex flex-col items-center">
                            <i data-lucide="plane" class="w-6 h-6 text-blue-400 rotate-90"></i>
                            <p class="text-[10px] text-slate-400"><?= $tour['duration'] ?> Jam</p>
                            <div class="border-t-2 border-dashed border-slate-200 w-full mt-1"></div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-400 uppercase">To</p>
                            <h3 class="text-xl font-bold">DST</h3>
                            <p class="text-[10px] text-slate-500">Destinasi</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <p class="text-xs text-slate-400 uppercase mb-1">Passenger</p>
                        <h4 class="font-bold text-lg">Azka (Guest)</h4>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-8">
                        <div>
                            <p class="text-xs text-slate-400 uppercase">Date</p>
                            <p class="font-bold text-sm">14 Mar</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xs text-slate-400 uppercase">Gate</p>
                            <p class="font-bold text-sm">A4</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-400 uppercase">Seat</p>
                            <p class="font-bold text-sm">3F</p>
                        </div>
                    </div>

                    <div class="relative h-1 border-t-2 border-dashed border-slate-200 my-8">
                        <div class="absolute -top-3 -left-9 w-6 h-6 bg-gray-50 rounded-full"></div>
                        <div class="absolute -top-3 -right-9 w-6 h-6 bg-gray-50 rounded-full"></div>
                    </div>

                    <div class="flex flex-col items-center justify-center gap-4">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Ticket-<?= $tour['id'] ?>-User-Azka" class="w-32 h-32 opacity-90">
                        <p class="text-xs text-slate-400">Scan this code at the gate</p>
                    </div>
                </div>
            </div>

            <button class="w-full bg-[#4FC3F7] text-white font-bold py-4 rounded-2xl shadow-lg mt-6 active:scale-95 transition flex justify-center items-center gap-2">
                Download Ticket
            </button>
        </div>
    </div>


    <div class="hidden md:block">
        <nav class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 px-16 py-6 flex justify-between items-center">
            <div class="flex items-center gap-12">
                <a href="<?= base_url('/') ?>" class="text-xl font-bold tracking-[0.2em] uppercase hover:text-blue-600 transition">Tripio</a>
            </div>
            <a href="<?= base_url('/') ?>" class="text-xs font-bold uppercase tracking-widest text-slate-500 hover:text-black">← Kembali</a>
        </nav>

        <main class="pt-32 pb-20 px-16 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative aspect-[4/3] rounded-sm overflow-hidden shadow-2xl group">
                    <img src="<?= $tour['image_url'] ?>" class="w-full h-full object-cover transition duration-1000 group-hover:scale-105">
                    <div class="absolute top-6 left-6 bg-white/90 backdrop-blur-md px-4 py-2 text-xs font-bold uppercase tracking-widest">
                        Rekomendasi
                    </div>
                </div>

                <div>
                    <span class="text-[#C19A6B] text-xs font-bold uppercase tracking-[0.2em] mb-4 block">Detail Paket Tur</span>
                    <h1 class="text-5xl font-bold text-slate-800 mb-6 leading-tight"><?= $tour['name'] ?></h1>
                    
                    <p class="text-slate-500 leading-relaxed mb-8 text-sm border-l-2 border-[#C19A6B] pl-6">
                        <?= $tour['description'] ?>. Nikmati perjalanan yang telah kami kurasi khusus untuk memberikan pengalaman terbaik bagi Anda dan kerabat.
                    </p>

                    <div class="grid grid-cols-2 gap-6 mb-10">
                        <div class="p-4 bg-gray-50 border border-gray-100">
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">Durasi</p>
                            <p class="font-bold text-lg flex items-center gap-2"><i data-lucide="clock" class="w-4 h-4"></i> <?= $tour['duration'] ?> Hari</p>
                        </div>
                        <div class="p-4 bg-gray-50 border border-gray-100">
                            <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">Kapasitas</p>
                            <p class="font-bold text-lg flex items-center gap-2"><i data-lucide="users" class="w-4 h-4"></i> <?= $tour['capacity'] ?> Orang</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-8 border-t border-gray-100 pt-8">
                        <div>
                            <p class="text-[10px] text-slate-400 line-through">IDR <?= number_format($tour['price'], 0, ',', '.') ?></p>
                            <p class="text-3xl font-bold text-[#D32F2F]">IDR <?= number_format($tour['discount_price'], 0, ',', '.') ?></p>
                        </div>
                        <button class="flex-1 bg-[#5C4033] text-white py-5 rounded-sm font-bold uppercase tracking-[0.1em] hover:bg-black transition shadow-xl">
                            Konfirmasi Booking
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>