<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tripio</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Scrollbar Halus */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-[#1E293B] text-white flex flex-col shadow-2xl z-50">
            
            <div class="h-20 flex items-center px-8 border-b border-slate-700 bg-[#0F172A]">
                <div class="flex items-center gap-2">
                    <div class="bg-blue-600 p-1.5 rounded-lg">
                        <i data-lucide="compass" class="w-5 h-5 text-white"></i>
                    </div>
                    <h1 class="text-lg font-extrabold tracking-wider">
                        TRIPIO <span class="text-blue-400">ADMIN</span>
                    </h1>
                </div>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                <p class="px-4 text-[10px] font-bold text-slate-500 uppercase mb-3 tracking-widest">Main Menu</p>
                
                <?php 
                // Logika agar menu aktif berwarna biru
                $uri = service('uri');
                // Mengambil segmen ke-2 (misal: admin/bookings -> bookings)
                $segment = $uri->getTotalSegments() > 1 ? $uri->getSegment(2) : ''; 
                ?>
                
                <a href="<?= base_url('admin') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= $segment == '' ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 <?= $segment == '' ? 'text-white' : 'text-slate-500 group-hover:text-white' ?>"></i>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>

                <a href="<?= base_url('admin/tours') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= $segment == 'tours' ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <i data-lucide="map" class="w-5 h-5 <?= $segment == 'tours' ? 'text-white' : 'text-slate-500 group-hover:text-white' ?>"></i>
                    <span class="font-medium text-sm">Kelola Tur</span>
                </a>

                <a href="<?= base_url('admin/bookings') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group <?= $segment == 'bookings' ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <i data-lucide="ticket" class="w-5 h-5 <?= $segment == 'bookings' ? 'text-white' : 'text-slate-500 group-hover:text-white' ?>"></i>
                    <span class="font-medium text-sm">Data Pesanan</span>
                </a>

                <div class="my-6 border-t border-slate-700 mx-4"></div>

                <p class="px-4 text-[10px] font-bold text-slate-500 uppercase mb-3 tracking-widest">System</p>

                <a href="<?= base_url('/') ?>" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition duration-200 group">
                    <i data-lucide="external-link" class="w-5 h-5 text-slate-500 group-hover:text-white"></i>
                    <span class="font-medium text-sm">Lihat Website</span>
                </a>

                <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 hover:text-red-500 transition duration-200 mt-2">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span class="font-medium text-sm">Logout</span>
                </a>
            </nav>

            <div class="p-4 border-t border-slate-700 bg-[#0F172A]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-500 to-purple-600 flex items-center justify-center font-bold text-white shadow-md">
                        A
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">Administrator</p>
                        <p class="text-[10px] text-slate-500 uppercase font-bold tracking-wider">Super Admin</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto h-screen bg-[#F8FAFC] relative w-full">
            <header class="bg-white h-16 border-b border-gray-200 sticky top-0 z-30 flex items-center px-8 justify-between shadow-sm">
                 <h2 class="text-slate-500 text-sm font-medium">Panel Admin Tripio v2.0</h2>
                 <div class="flex items-center gap-4">
                     <button class="p-2 text-slate-400 hover:bg-slate-50 rounded-full transition">
                         <i data-lucide="bell" class="w-5 h-5"></i>
                     </button>
                     <div class="w-8 h-8 rounded-full bg-slate-200 overflow-hidden">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff" class="w-full h-full">
                     </div>
                 </div>
            </header>

            <?= $this->renderSection('content') ?>
            
            <footer class="p-8 text-center text-xs text-slate-400">
                &copy; <?= date('Y') ?> Tripio Travel App. All rights reserved.
            </footer>
        </main>

    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>