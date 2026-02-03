<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto px-6 py-12">
    
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Riwayat Perjalanan</h1>
        <p class="text-slate-500 text-sm">Daftar tiket dan status pesanan Anda.</p>
    </div>

    <?php if(empty($bookings)): ?>
        <div class="text-center py-16 bg-white rounded-2xl border border-gray-100 shadow-sm">
            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <i data-lucide="map" class="w-8 h-8 text-gray-300"></i>
            </div>
            <p class="font-bold text-slate-800">Belum ada perjalanan</p>
            <p class="text-sm text-slate-400 mb-6">Yuk, mulai petualangan pertamamu!</p>
            <a href="<?= base_url('/') ?>" class="inline-block bg-[#5C4033] text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-black transition">
                Cari Destinasi
            </a>
        </div>
    <?php else: ?>

        <div class="space-y-6">
            <?php foreach($bookings as $row): ?>
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm flex flex-col md:flex-row gap-6 hover:shadow-md transition">
                
                <img src="<?= $row['image_url'] ?>" class="w-full md:w-32 h-32 object-cover rounded-xl bg-gray-200">

                <div class="flex-grow">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <p class="text-xs text-slate-400 font-bold uppercase mb-1">
                                #TRIP-<?= str_pad($row['id'], 5, '0', STR_PAD_LEFT) ?>
                            </p>
                            <h3 class="font-bold text-slate-800 text-lg"><?= $row['tour_name'] ?></h3>
                        </div>
                        
                        <?php if($row['status'] == 'confirmed'): ?>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase border border-green-200 flex items-center gap-1">
                                <i data-lucide="check-circle" class="w-3 h-3"></i> Confirmed
                            </span>
                        <?php elseif($row['status'] == 'cancelled'): ?>
                            <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-bold uppercase border border-red-100">
                                Cancelled
                            </span>
                        <?php else: ?>
                            <span class="bg-yellow-50 text-yellow-600 px-3 py-1 rounded-full text-xs font-bold uppercase border border-yellow-100 flex items-center gap-1">
                                <span class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></span> Menunggu Verifikasi
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="text-sm text-slate-500 space-y-1 mb-4">
                        <p><span class="font-bold">Tanggal Pesan:</span> <?= date('d M Y', strtotime($row['booking_date'])) ?></p>
                        <p><span class="font-bold">Jumlah:</span> <?= $row['quantity'] ?> Orang</p>
                        <p><span class="font-bold">Total:</span> Rp <?= number_format($row['total_price'], 0, ',', '.') ?></p>
                    </div>

                    <div class="flex gap-3 border-t border-gray-100 pt-4">
                        <?php if($row['status'] == 'confirmed'): ?>
                            <a href="<?= base_url('booking/print/' . $row['id']) ?>" target="_blank" class="flex items-center gap-2 bg-[#5C4033] text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-black transition">
                                <i data-lucide="printer" class="w-4 h-4"></i> Cetak E-Ticket
                            </a>
                        <?php elseif($row['status'] == 'pending'): ?>
                            <button disabled class="flex items-center gap-2 bg-gray-100 text-gray-400 px-4 py-2 rounded-lg text-sm font-bold cursor-not-allowed">
                                <i data-lucide="clock" class="w-4 h-4"></i> Tiket Belum Terbit
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>