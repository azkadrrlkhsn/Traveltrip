<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>

<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Kelola Paket Wisata</h1>
            <p class="text-slate-500">Kelola destinasi wisata yang tersedia di website.</p>
        </div>
        <a href="<?= base_url('admin/tours/create') ?>" class="bg-[#1E293B] text-white px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-black transition flex items-center gap-2 shadow-lg">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah Baru
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-wider">ID</th>
                    <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Paket Wisata</th>
                    <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Lokasi</th>
                    <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-wider">Harga</th>
                    <th class="p-5 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach($tours as $tour): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-5 text-sm font-bold text-slate-400">#<?= $tour['id'] ?></td>
                    <td class="p-5">
                        <div class="flex items-center gap-4">
                            <img src="<?= base_url($tour['image_url']) ?>" class="w-12 h-12 object-cover rounded-lg bg-gray-200 border border-gray-100">
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm"><?= $tour['name'] ?></h4>
                                <p class="text-xs text-slate-500"><?= $tour['duration'] ?> Hari</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-5 text-sm font-medium text-slate-600">
                        <div class="flex items-center gap-1">
                            <i data-lucide="map-pin" class="w-3 h-3 text-slate-400"></i> <?= $tour['location'] ?>
                        </div>
                    </td>
                    <td class="p-5">
                        <span class="text-xs text-slate-400 line-through block">Rp <?= number_format($tour['price']) ?></span>
                        <span class="text-sm font-bold text-slate-800">Rp <?= number_format($tour['discount_price']) ?></span>
                    </td>
                    <td class="p-5 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="<?= base_url('admin/tours/edit/'.$tour['id']) ?>" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= base_url('admin/tours/delete/'.$tour['id']) ?>" onclick="return confirm('Hapus paket ini?')" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php if(empty($tours)): ?>
            <div class="p-8 text-center text-slate-400">Belum ada data paket wisata.</div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>