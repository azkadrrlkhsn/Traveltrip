<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="px-6 md:px-0 pt-6 pb-20">
    <h1 class="text-2xl font-bold text-slate-800 mb-6 text-center">Selesaikan Pembayaran</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
        
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm h-fit">
            <p class="text-xs text-slate-500 font-bold uppercase tracking-wider mb-2">Total Tagihan</p>
            <h2 class="text-3xl font-bold text-orange-500 mb-4"><?= $p['total_formatted'] ?></h2>
            
            <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 mb-4">
                <p class="text-sm text-blue-800 font-bold">Kode Booking: <?= $p['kode_booking'] ?></p>
                <p class="text-xs text-blue-600">Selesaikan dalam 15 menit.</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-lg mb-4">Pilih Metode Pembayaran</h3>
            
            <form action="<?= base_url('booking/verifikasi') ?>" method="post">
                <input type="hidden" name="kode_booking" value="<?= $p['kode_booking'] ?>">

                <div class="space-y-3 mb-6">
                    <label class="flex items-center gap-4 p-4 border border-slate-200 rounded-xl cursor-pointer hover:border-tripio-500 hover:bg-slate-50 transition">
                        <input type="radio" name="metode_bayar" value="BCA" checked class="w-4 h-4 text-tripio-600 focus:ring-tripio-500">
                        <div class="flex-grow">
                            <p class="font-bold text-slate-700">Transfer Bank BCA</p>
                            <p class="text-xs text-slate-400">Dicek otomatis</p>
                        </div>
                        <div class="font-bold text-blue-800 italic">BCA</div>
                    </label>

                    <label class="flex items-center gap-4 p-4 border border-slate-200 rounded-xl cursor-pointer hover:border-tripio-500 hover:bg-slate-50 transition">
                        <input type="radio" name="metode_bayar" value="Mandiri" class="w-4 h-4 text-tripio-600 focus:ring-tripio-500">
                        <div class="flex-grow">
                            <p class="font-bold text-slate-700">Transfer Mandiri</p>
                            <p class="text-xs text-slate-400">Dicek otomatis</p>
                        </div>
                        <div class="font-bold text-blue-900 italic">Mandiri</div>
                    </label>

                     <label class="flex items-center gap-4 p-4 border border-slate-200 rounded-xl cursor-pointer hover:border-tripio-500 hover:bg-slate-50 transition">
                        <input type="radio" name="metode_bayar" value="QRIS" class="w-4 h-4 text-tripio-600 focus:ring-tripio-500">
                        <div class="flex-grow">
                            <p class="font-bold text-slate-700">QRIS</p>
                            <p class="text-xs text-slate-400">Scan & Bayar</p>
                        </div>
                         <div class="font-bold text-slate-800">QRIS</div>
                    </label>
                </div>

                <button type="submit" class="w-full bg-tripio-600 text-white font-bold py-3 rounded-xl hover:bg-tripio-700 transition shadow-lg">
                    Saya Sudah Membayar
                </button>
            </form>
        </div>

    </div>
</div>

<?= $this->endSection() ?>