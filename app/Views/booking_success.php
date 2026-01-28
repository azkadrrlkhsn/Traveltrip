<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="min-h-[80vh] flex items-center justify-center px-6 py-10">
    <div class="bg-white w-full max-w-lg p-8 rounded-3xl border border-slate-100 shadow-xl text-center relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-tripio-500 via-purple-500 to-orange-500"></div>

        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" /></svg>
        </div>

        <h1 class="text-2xl font-bold text-slate-800 mb-2">Pembayaran Berhasil!</h1>
        <p class="text-slate-500 text-sm mb-8">E-Tiket telah dikirim ke email <b><?= $pesanan['email'] ?></b></p>

        <div class="bg-slate-50 rounded-xl p-4 mb-8 text-left border border-slate-200">
            <p class="text-xs text-slate-400 uppercase tracking-wider mb-1">Kode Booking</p>
            <p class="text-2xl font-mono font-bold text-tripio-600 tracking-widest mb-4"><?= $pesanan['kode_booking'] ?></p>
            
            <div class="flex justify-between items-center border-t border-slate-200 pt-4">
                <div>
                    <p class="font-bold text-sm text-slate-700"><?= $flight['maskapai'] ?></p>
                    <p class="text-xs text-slate-500"><?= $flight['asal_kota'] ?> &rarr; <?= $flight['tujuan_kota'] ?></p>
                </div>
                <div class="text-right">
                     <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-[10px] font-bold uppercase"><?= $pesanan['status'] ?></span>
                </div>
            </div>
        </div>

        <a href="<?= base_url('/') ?>" class="block w-full bg-tripio-900 text-white font-bold py-3 rounded-xl hover:bg-tripio-800 transition">
            Kembali ke Beranda
        </a>
    </div>
</div>

<?= $this->endSection() ?>