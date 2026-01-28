<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="px-6 md:px-0 pt-6 pb-20">
    
    <div class="flex items-center gap-2 text-xs text-slate-400 mb-6">
        <a href="<?= base_url('cari') ?>" class="hover:text-tripio-600"> &larr; Kembali</a>
        <span class="text-tripio-600 font-bold">/ Isi Data Pemesanan</span>
    </div>

    <form action="<?= base_url('booking/proses') ?>" method="post">
        
        <input type="hidden" name="flight_id" value="<?= $t['id'] ?>">
        <input type="hidden" name="total_bayar" value="<?= $t['total_angka'] ?>">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="md:col-span-2 space-y-6">
                
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <h2 class="font-bold text-lg mb-4 flex items-center gap-2 text-slate-800">
                        <span class="w-6 h-6 rounded-full bg-tripio-100 text-tripio-600 flex items-center justify-center text-xs font-bold">1</span>
                        Data Pemesan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1">Nama Lengkap</label>
                            <input type="text" name="nama_pemesan" required class="w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-tripio-500 font-medium" placeholder="Sesuai KTP">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1">Nomor HP</label>
                            <input type="tel" name="no_hp" required class="w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-tripio-500 font-medium" placeholder="0812...">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-500 mb-1">Email</label>
                            <input type="email" name="email" required class="w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-tripio-500 font-medium" placeholder="E-tiket akan dikirim ke sini">
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                    <h2 class="font-bold text-lg mb-4 flex items-center gap-2 text-slate-800">
                        <span class="w-6 h-6 rounded-full bg-tripio-100 text-tripio-600 flex items-center justify-center text-xs font-bold">2</span>
                        Data Penumpang
                    </h2>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1">Nama Lengkap Penumpang</label>
                        <input type="text" name="nama_penumpang" required class="w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-tripio-500 font-medium" placeholder="Sesuai KTP/Paspor">
                    </div>
                </div>

                <div class="md:hidden">
                    <button type="submit" class="w-full bg-orange-500 text-white font-bold py-4 rounded-xl shadow-lg shadow-orange-200">
                        Bayar Sekarang
                    </button>
                </div>
            </div>

            <div class="md:col-span-1">
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm sticky top-24">
                    <h3 class="font-bold text-slate-800 mb-4">Penerbangan Anda</h3>
                    
                    <div class="flex gap-3 mb-4 border-b border-slate-50 pb-4">
                        <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center font-bold text-xs border border-slate-100 text-tripio-600">
                            <?= substr($t['maskapai'], 0, 2) ?>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-slate-700"><?= $t['maskapai'] ?></p>
                            <p class="text-xs text-slate-400"><?= $t['asal_kota'] ?> &rarr; <?= $t['tujuan_kota'] ?></p>
                            <p class="text-xs text-slate-400 mt-1"><?= substr($t['jam_berangkat'],0,5) ?> - <?= substr($t['jam_tiba'],0,5) ?></p>
                        </div>
                    </div>

                    <div class="border-t border-dashed border-slate-200 pt-4 flex justify-between items-center mb-6">
                        <span class="font-bold text-slate-800">Total Pembayaran</span>
                        <span class="font-bold text-xl text-orange-500"><?= $t['total_formatted'] ?></span>
                    </div>

                    <button type="submit" class="hidden md:block w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-orange-200 transform hover:-translate-y-1">
                        Lanjut Pembayaran
                    </button>
                    <p class="text-[10px] text-center text-slate-400 mt-3">Transaksi aman dan terenkripsi.</p>
                </div>
            </div>

        </div>
    </form>
</div>

<?= $this->endSection() ?>