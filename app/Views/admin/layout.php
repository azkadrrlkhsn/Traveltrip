<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tripio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 text-slate-800">

    <?php 
        // Pencegah Error: Jika controller lupa kirim $current_page, set default kosong
        $current = isset($current_page) ? $current_page : ''; 
    ?>

    <div class="flex min-h-screen">
        
        <aside class="w-64 bg-[#1e293b] text-white flex-shrink-0 hidden md:block fixed h-full z-10">
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-xl font-bold tracking-widest uppercase">Tripio <span class="text-[#4FC3F7]">Admin</span></h1>
            </div>
            
            <nav class="p-4 space-y-2">
                <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-2">Main Menu</p>
                
                <a href="<?= base_url('admin') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition hover:bg-white/10 <?= ($current == 'dashboard') ? 'bg-[#4FC3F7] text-[#1e293b] font-bold' : 'text-gray-300' ?>">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard
                </a>
                
                <a href="<?= base_url('admin/tours') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition hover:bg-white/10 <?= ($current == 'tours') ? 'bg-[#4FC3F7] text-[#1e293b] font-bold' : 'text-gray-300' ?>">
                    <i data-lucide="map" class="w-5 h-5"></i> Kelola Tur
                </a>

<a href="<?= base_url('admin/bookings') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition hover:bg-white/10 <?= ($current == 'bookings') ? 'bg-[#4FC3F7] text-[#1e293b] font-bold' : 'text-gray-300' ?>">
    <i data-lucide="ticket" class="w-5 h-5"></i> Data Pesanan
    <?php if(isset($total_pending) && $total_pending > 0): ?>
        <span class="ml-auto bg-red-500 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full"><?= $total_pending ?></span>
    <?php endif; ?>
</a>
                <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-6">System</p>
                
                <a href="<?= base_url('/') ?>" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl transition hover:bg-white/10 text-gray-300">
                    <i data-lucide="external-link" class="w-5 h-5"></i> Lihat Website
                </a>
                
                <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition hover:bg-red-500/20 text-red-400 hover:text-red-200">
                    <i data-lucide="log-out" class="w-5 h-5"></i> Logout
                </a>
            </nav>
        </aside>

        <main class="flex-1 flex flex-col md:ml-64 transition-all duration-300 min-h-screen">
            <div class="bg-white p-4 shadow-sm md:hidden flex justify-between items-center sticky top-0 z-50">
                <span class="font-bold text-slate-800">Tripio Admin</span>
                <button class="p-2 bg-gray-100 rounded-lg"><i data-lucide="menu" class="w-6 h-6 text-slate-600"></i></button>
            </div>

            <div class="p-6 md:p-8">
                <?= $this->renderSection('content') ?>
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>