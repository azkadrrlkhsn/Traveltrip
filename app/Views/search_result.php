<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="bg-tripio-900 text-white -mt-6 pt-10 pb-16 px-6 md:px-0 md:rounded-b-3xl md:mt-6 md:pt-8 md:pb-12 shadow-md mb-6 md:mb-10">
    <div class="max-w-7xl mx-auto md:px-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <p class="text-blue-200 text-xs font-medium uppercase tracking-wider mb-1">Hasil Pencarian Penerbangan</p>
                <h1 class="text-2xl font-bold flex items-center gap-3">
                    <?= $rute_asal ?> 
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 opacity-50"><path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z" clip-rule="evenodd" /></svg>
                    <?= $rute_tujuan ?>
                </h1>
                <p class="text-sm text-blue-100 mt-1"><?= $tanggal ?> • 1 Penumpang • Ekonomi</p>
            </div>
            
            <a href="<?= base_url('/') ?>" class="text-sm font-semibold bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full transition">
                Ubah Pencarian
            </a>
        </div>
    </div>
</div>

<div class="px-6 md:px-0 pb-20" x-data="{ showFilter: false }">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

        <div class="md:hidden mb-4">
            <button @click="showFilter = !showFilter" class="w-full bg-white border border-slate-200 text-slate-700 font-bold py-3 rounded-xl flex justify-center items-center gap-2 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M18.75 12.75h1.5a.75.75 0 000-1.5h-1.5a.75.75 0 000 1.5zM12 6a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 0112 6zM12 18a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 0112 18zM3.75 6.75h1.5a.75.75 0 100-1.5h-1.5a.75.75 0 000 1.5zM5.25 18.75h-1.5a.75.75 0 010-1.5h1.5a.75.75 0 010 1.5zM3 12a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 013 12zM9 3.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zM12.75 12a2.25 2.25 0 114.5 0 2.25 2.25 0 01-4.5 0zM9 15.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" /></svg>
                <span x-text="showFilter ? 'Tutup Filter' : 'Filter Penerbangan'"></span>
            </button>
        </div>

        <aside class="md:col-span-1 md:block" :class="showFilter ? 'block' : 'hidden md:block'">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm sticky top-24">
                <h3 class="font-bold text-lg mb-4 text-slate-800">Filter</h3>
                
                <div class="mb-6 border-b border-slate-50 pb-4">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Waktu Berangkat</h4>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded text-tripio-600 focus:ring-tripio-500 border-slate-300">
                            <span class="text-sm text-slate-600">Pagi (04:00 - 11:00)</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded text-tripio-600 focus:ring-tripio-500 border-slate-300">
                            <span class="text-sm text-slate-600">Siang (11:00 - 15:00)</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded text-tripio-600 focus:ring-tripio-500 border-slate-300">
                            <span class="text-sm text-slate-600">Sore (15:00 - 18:30)</span>
                        </label>
                    </div>
                </div>

                <div class="mb-2">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Maskapai</h4>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked class="rounded text-tripio-600 focus:ring-tripio-500 border-slate-300">
                            <span class="text-sm text-slate-600">Garuda Indonesia</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked class="rounded text-tripio-600 focus:ring-tripio-500 border-slate-300">
                            <span class="text-sm text-slate-600">Lion Air</span>
                        </label>
                         <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" checked class="rounded text-tripio-600 focus:ring-tripio-500 border-slate-300">
                            <span class="text-sm text-slate-600">Citilink</span>
                        </label>
                    </div>
                </div>
            </div>
        </aside>

        <div class="md:col-span-3 flex flex-col gap-4">
            
            <?php if(empty($tiket)): ?>
                <div class="bg-white p-12 rounded-2xl border border-slate-100 text-center">
                    <div class="bg-slate-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10"><path fill-rule="evenodd" d="M5.478 5.559A1.5 1.5 0 016.912 4.5H9A.75.75 0 009 3H6.912a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.233 1.011v1.008c0 2.49 2.02 4.512 4.511 4.512a4.507 4.507 0 003.888-2.193 4.505 4.505 0 003.885 2.193 4.505 4.505 0 003.888-2.193 4.507 4.507 0 003.885 2.193c.192 0 .38-.016.564-.047l.808 2.423a1.5 1.5 0 01-1.423 1.974h-6a.75.75 0 000 1.5h6a3 3 0 002.847-3.948l-1.077-3.23a4.5 4.5 0 00-4.04-3.153h-1.5c-2.03 0-3.757 1.35-4.329 3.235A4.49 4.49 0 0013.5 12h-3a4.49 4.49 0 00-2.192 2.766A4.5 4.5 0 006.1 12H4.51c-.98 0-1.855.45-2.448 1.168l-1.085-3.525A3 3 0 015.478 5.56zM9 4.5h2.25a.75.75 0 010 1.5H9a.75.75 0 010-1.5z" clip-rule="evenodd" /></svg>
                    </div>
                    <h3 class="font-bold text-slate-800">Penerbangan Tidak Ditemukan</h3>
                    <p class="text-slate-500 text-sm mt-2">Coba ganti tanggal atau kota tujuan lain.</p>
                </div>
            <?php endif; ?>

            <?php foreach($tiket as $t): ?>
            <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group">
                <div class="flex flex-col md:flex-row justify-between md:items-center gap-6">
                    
                    <div class="flex gap-4 items-center">
                        <div class="w-12 h-12 rounded-full bg-slate-50 flex items-center justify-center font-bold text-xs border border-slate-100 <?= $t['logo_color'] ?>">
                            <?= substr($t['maskapai'], 0, 2) ?>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800"><?= $t['maskapai'] ?></h4>
                            <div class="flex items-center gap-2 text-xs text-slate-400 mt-1">
                                <span class="bg-slate-100 px-2 py-0.5 rounded text-slate-500 font-mono"><?= $t['kode_penerbangan'] ?></span>
                                <span>•</span>
                                <span>Ekonomi</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-6 text-center md:text-left flex-grow md:justify-center bg-slate-50 md:bg-transparent p-3 md:p-0 rounded-xl">
                        <div>
                            <p class="text-lg font-bold text-slate-800"><?= substr($t['jam_berangkat'], 0, 5) ?></p>
                            <p class="text-xs text-slate-400"><?= $t['asal_kode'] ?></p>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-[10px] text-slate-400 mb-1"><?= $t['durasi'] ?></p>
                            <div class="w-16 h-[2px] bg-slate-300 relative">
                                <div class="absolute -top-[3px] right-0 w-2 h-2 rounded-full bg-slate-300"></div>
                            </div>
                            <p class="text-[10px] text-tripio-600 mt-1 font-medium">Langsung</p>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-slate-800"><?= substr($t['jam_tiba'], 0, 5) ?></p>
                            <p class="text-xs text-slate-400"><?= $t['tujuan_kode'] ?></p>
                        </div>
                    </div>

                    <div class="flex md:flex-col justify-between items-center md:items-end gap-1 md:gap-2 border-t md:border-t-0 border-slate-100 pt-4 md:pt-0 mt-2 md:mt-0">
                        <p class="text-lg font-bold text-orange-500"><?= $t['harga_formatted'] ?></p>
                        <a href="<?= base_url('pesan/' . $t['id']) ?>" class="bg-tripio-600 text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-tripio-700 transition shadow-lg shadow-tripio-200">
                            Pilih
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        </div>
</div>

<?= $this->endSection() ?>