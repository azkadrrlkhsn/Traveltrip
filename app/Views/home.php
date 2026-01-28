<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="px-6 md:px-0 mt-6 md:mt-12 md:bg-tripio-900 md:rounded-3xl md:p-12 md:text-white relative overflow-hidden">
    
    <div class="hidden md:block absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-16 -mt-16"></div>
    
    <div class="relative z-10 md:max-w-2xl">
        <h2 class="hidden md:block text-4xl font-bold mb-6">Jelajahi Dunia dengan <br>Cara yang Baru.</h2>
        
        <form action="<?= base_url('/cari') ?>" method="get" class="bg-white p-2 rounded-3xl md:rounded-full shadow-lg shadow-slate-200/50 flex flex-col md:flex-row md:items-center relative z-20 text-slate-800">
            
            <div class="relative flex-grow border-b md:border-b-0 md:border-r border-slate-100 group">
                <div class="absolute inset-y-0 left-0 flex items-center pl-6 pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                    </svg>
                </div>
                <div class="absolute top-2 left-14 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Dari</div>
                <input type="text" name="asal" value="Jakarta (CGK)" 
                       class="block w-full pt-6 pb-2 pl-14 pr-4 text-tripio-900 bg-transparent rounded-t-3xl md:rounded-l-full md:rounded-tr-none focus:outline-none font-bold placeholder-slate-300" 
                       placeholder="Kota Asal">
            </div>

            <div class="relative flex-grow border-b md:border-b-0 md:border-r border-slate-100 group">
                <div class="absolute inset-y-0 left-0 flex items-center pl-6 pointer-events-none text-tripio-500">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                     </svg>
                </div>
                <div class="absolute top-2 left-14 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Ke</div>
                <input type="text" name="tujuan" value="Bali (DPS)" 
                       class="block w-full pt-6 pb-2 pl-14 pr-4 text-tripio-900 bg-transparent focus:outline-none font-bold placeholder-slate-300" 
                       placeholder="Kota Tujuan">
            </div>

            <div class="relative md:w-48 border-b md:border-b-0 md:border-r border-slate-100">
                <div class="absolute inset-y-0 left-0 flex items-center pl-6 pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5 .75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5 .75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5 .75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5 .75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5 .75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5 .75.75 0 000 1.5z" />
                        <path fill-rule="evenodd" d="M6.75 2.25a.75.75 0 01.75.75v1.5h9v-1.5a.75.75 0 011.5 0v1.5h1.5a3 3 0 013 3v9.75a3 3 0 01-3 3h-13.5a3 3 0 01-3-3v-9.75a3 3 0 013-3h1.5v-1.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="absolute top-2 left-14 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Pergi</div>
                <input type="date" name="tanggal" 
                       class="block w-full pt-6 pb-2 pl-14 pr-4 text-slate-600 bg-transparent focus:outline-none font-bold text-sm">
            </div>

            <button type="submit" class="m-2 bg-tripio-600 hover:bg-tripio-500 text-white rounded-full px-8 py-3 md:py-0 md:h-full font-bold transition shadow-md md:w-auto w-full flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                </svg>
                Cari
            </button>
        </form>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-12 gap-8 px-6 md:px-0 mt-8">
    
    <div class="md:col-span-4">
        <h3 class="hidden md:block text-lg font-bold text-slate-800 mb-4">Kategori</h3>
        <div class="flex md:grid md:grid-cols-3 space-x-6 md:space-x-0 md:gap-4 overflow-x-auto no-scrollbar pb-2">
            <button class="flex flex-col items-center gap-2 min-w-[64px] group w-full">
                <div class="w-16 h-16 md:w-full md:h-24 rounded-3xl bg-white border border-slate-100 shadow-sm flex items-center justify-center text-tripio-600 group-hover:border-tripio-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8"><path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" /></svg>
                </div>
                <span class="text-xs font-semibold text-slate-600">Pesawat</span>
            </button>
            <button class="flex flex-col items-center gap-2 min-w-[64px] group w-full">
                <div class="w-16 h-16 md:w-full md:h-24 rounded-3xl bg-white border border-slate-100 shadow-sm flex items-center justify-center text-orange-500 group-hover:border-orange-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8"><path fill-rule="evenodd" d="M4.5 2.25a.75.75 0 00-1.5 0v1.5h1.5V2.25zM4.5 21a.75.75 0 00-1.5 0v1.5h1.5V21zM22.5 2.25a.75.75 0 01-1.5 0v1.5h1.5V2.25zM22.5 21a.75.75 0 01-1.5 0v1.5h1.5V21z" clip-rule="evenodd" /><path fill-rule="evenodd" d="M1.5 6.75A.75.75 0 012.25 6h19.5a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75H2.25a.75.75 0 01-.75-.75V6.75zM12 13.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd" /></svg>
                </div>
                <span class="text-xs font-semibold text-slate-600">Hotel</span>
            </button>
            <button class="flex flex-col items-center gap-2 min-w-[64px] group w-full">
                <div class="w-16 h-16 md:w-full md:h-24 rounded-3xl bg-white border border-slate-100 shadow-sm flex items-center justify-center text-emerald-500 group-hover:border-emerald-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8"><path d="M4.5 10.5a7.5 7.5 0 1115 0v3.75a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75V12a4.5 4.5 0 00-9 0v2.25a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75v-3.75z" /><path fill-rule="evenodd" d="M9 7.5a.75.75 0 01.75-.75h4.5a.75.75 0 010 1.5h-4.5A.75.75 0 019 7.5zM6 18a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm12 0a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd" /></svg>
                </div>
                <span class="text-xs font-semibold text-slate-600">Kereta</span>
            </button>
        </div>
    </div>

    <div class="md:col-span-8">
        <div class="<?= $promo_banner['color'] ?? 'bg-blue-900' ?> rounded-3xl p-6 relative overflow-hidden text-white shadow-xl shadow-blue-900/20 md:h-full md:flex md:items-center">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>
            <div class="relative z-10 w-full">
                <span class="inline-block px-3 py-1 bg-white/20 rounded-full text-[10px] font-bold tracking-wide mb-2 uppercase">Promo Spesial</span>
                <h2 class="text-2xl font-bold leading-tight mb-1"><?= $promo_banner['title'] ?? 'Promo' ?></h2>
                <p class="text-blue-100 text-sm mb-4 md:max-w-md"><?= $promo_banner['desc'] ?? 'Deskripsi promo' ?></p>
                <button class="bg-white text-tripio-900 px-5 py-2.5 rounded-full text-xs font-bold hover:bg-slate-100 transition shadow-sm">Lihat Promo</button>
            </div>
        </div>
    </div>
</div>

<div class="mt-8 px-6 md:px-0 pb-6">
    <div class="flex justify-between items-end mb-4">
        <h3 class="text-lg font-bold text-slate-800">Destinasi Pilihan</h3>
        <a href="#" class="text-xs font-medium text-tripio-600 hover:underline">Lihat Semua</a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
        <?php if(!empty($destinations)): foreach($destinations as $dest): ?>
        <div class="bg-white p-3 rounded-2xl flex md:flex-col gap-4 shadow-sm border border-slate-50 hover:shadow-lg transition group cursor-pointer">
            <div class="w-20 h-20 md:w-full md:h-48 bg-slate-200 rounded-xl flex-shrink-0 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/random/400x300/?<?= strtolower($dest['city']) ?>')">
            </div>
            
            <div class="flex flex-col justify-center flex-grow md:px-2 md:pb-2">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="text-[10px] text-tripio-500 font-bold uppercase tracking-wider block mb-1"><?= $dest['tag'] ?></span>
                        <h4 class="text-base md:text-lg font-bold text-slate-800 group-hover:text-tripio-600 transition"><?= $dest['city'] ?></h4>
                    </div>
                    <div class="md:hidden text-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z" clip-rule="evenodd" /></svg>
                    </div>
                </div>
                <p class="text-xs text-slate-400 mt-1">Mulai <span class="text-orange-500 font-bold text-sm md:text-base block md:inline"><?= $dest['price'] ?></span> /pax</p>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
</div>

<?= $this->endSection() ?>