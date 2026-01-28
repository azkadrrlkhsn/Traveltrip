<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Tripio - Jelajah Tanpa Batas</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <script src="<?= base_url('assets/js/tailwind.js') ?>"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        tripio: {
                            50: '#f0f9ff', 100: '#e0f2fe', 500: '#0ea5e9',
                            600: '#0284c7', 900: '#0c4a6e',
                        }
                    },
                    borderRadius: { '4xl': '2rem' }
                }
            }
        }
    </script>
    <script src="<?= base_url('assets/js/alpine.js') ?>" defer></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased pb-24 md:pb-0"> 
    <header class="px-6 py-4 bg-white sticky top-0 z-50 shadow-sm md:px-12 md:py-5">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <div class="flex items-center gap-12">
                <div>
                    <h1 class="text-2xl font-bold text-tripio-900 tracking-tight">Tripio.</h1>
                    <p class="text-xs text-slate-500 md:hidden">Halo, Traveller</p>
                </div>

                <nav class="hidden md:flex gap-8">
                    <a href="#" class="text-sm font-semibold text-tripio-600">Beranda</a>
                    <a href="#" class="text-sm font-medium text-slate-500 hover:text-tripio-600 transition">Pesanan Saya</a>
                    <a href="#" class="text-sm font-medium text-slate-500 hover:text-tripio-600 transition">Promo</a>
                    <a href="#" class="text-sm font-medium text-slate-500 hover:text-tripio-600 transition">Bantuan</a>
                </nav>
            </div>
            
            <div class="flex items-center gap-4">
                <button class="hidden md:block text-sm font-bold text-tripio-600 border border-tripio-100 px-5 py-2 rounded-full hover:bg-tripio-50 transition">
                    Masuk / Daftar
                </button>
                <div class="w-10 h-10 rounded-full bg-tripio-100 flex items-center justify-center text-tripio-600 font-bold border-2 border-white shadow-md cursor-pointer">
                    TR
                </div>
            </div>
        </div>
    </header>

    <main class="w-full max-w-7xl mx-auto min-h-screen px-0 md:px-12">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="hidden md:block bg-white mt-20 py-10 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-12 text-center text-slate-400 text-sm">
            &copy; 2026 Tripio Indonesia. Offline First Project.
        </div>
    </footer>

    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-slate-100 px-6 py-3 z-30 rounded-t-3xl shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
        <div class="flex justify-between items-center max-w-md mx-auto">
            <a href="#" class="flex flex-col items-center gap-1 text-tripio-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" /><path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" /></svg>
                <span class="text-[10px] font-medium">Beranda</span>
            </a>
            <a href="#" class="flex flex-col items-center gap-1 text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 01-.375.65 2.249 2.249 0 000 3.898.75.75 0 01.375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 17.625v-3.026a.75.75 0 01.374-.65 2.249 2.249 0 000-3.898.75.75 0 01-.374-.65V6.375zm15-1.125a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0V6a.75.75 0 01.75-.75zm.75 4.5a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zm-.75 3a.75.75 0 01.75.75v.75a.75.75 0 01-1.5 0v-.75a.75.75 0 01.75-.75z" clip-rule="evenodd" /><path d="M4.5 9.75a.75.75 0 00-.75.75V15c0 .414.336.75.75.75h6.75A.75.75 0 0012 15v-4.5a.75.75 0 00-.75-.75H4.5z" /></svg>
                <span class="text-[10px] font-medium">Pesanan</span>
            </a>
            <a href="#" class="flex flex-col items-center gap-1 text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" /></svg>
                <span class="text-[10px] font-medium">Akun</span>
            </a>
        </div>
    </nav>
</body>
</html>