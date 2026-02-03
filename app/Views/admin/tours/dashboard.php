<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
            <p class="text-slate-500">Ringkasan performa hari ini.</p>
        </div>
        <div class="px-4 py-2 bg-white rounded-lg shadow-sm border border-gray-100 text-sm font-bold text-slate-600">
            📅 <?= date('d F Y') ?>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center gap-3 mb-2">
                <div class="p-2 bg-green-50 text-green-600 rounded-lg">
                    <i data-lucide="dollar-sign" class="w-5 h-5"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase">Pendapatan</span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-800">Rp <?= number_format($total_income, 0, ',', '.') ?></h3>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center gap-3 mb-2">
                <div class="p-2 bg-orange-50 text-orange-600 rounded-lg">
                    <i data-lucide="loader" class="w-5 h-5"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase">Menunggu Verifikasi</span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-800"><?= $pending_bookings ?> <span class="text-sm font-medium text-slate-400">Pesanan</span></h3>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center gap-3 mb-2">
                <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                    <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase">Total Transaksi</span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-800"><?= $total_bookings ?> <span class="text-sm font-medium text-slate-400">Booking</span></h3>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center gap-3 mb-2">
                <div class="p-2 bg-purple-50 text-purple-600 rounded-lg">
                    <i data-lucide="map" class="w-5 h-5"></i>
                </div>
                <span class="text-xs font-bold text-slate-400 uppercase">Paket Wisata</span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-800"><?= $total_tours ?> <span class="text-sm font-medium text-slate-400">Aktif</span></h3>
        </div>
    </div>
</div>

<?= $this->endSection() ?>