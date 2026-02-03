<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Kelola Paket Tur</h1>
            <p class="text-slate-500 text-sm">Daftar semua paket wisata yang aktif.</p>
        </div>
        <a href="<?= base_url('admin/tours/create') ?>" class="bg-[#5C4033] text-white px-6 py-3 rounded-xl font-bold text-sm flex items-center gap-2 hover:bg-black transition shadow-lg">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah Tur Baru
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase w-20">Gambar</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Nama Paket</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Harga</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase">Durasi</th>
                    <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if(!empty($tours)): ?>
                    <?php foreach($tours as $tour): ?>
                    <tr class="hover:bg-gray-50 group">
                        <td class="px-6 py-4">
                            <img src="<?= $tour['image_url'] ?>" class="w-12 h-12 rounded-lg object-cover bg-gray-200 shadow-sm">
                        </td>
                        
                        <td class="px-6 py-4">
                            <p class="font-bold text-sm text-slate-800"><?= $tour['name'] ?></p>
                            <p class="text-xs text-slate-400 truncate max-w-[200px]"><?= $tour['description'] ?></p>
                        </td>
                        
                        <td class="px-6 py-4">
                            <p class="font-bold text-sm text-[#D32F2F]">IDR <?= number_format($tour['discount_price'], 0, ',', '.') ?></p>
                            <p class="text-[10px] text-slate-400 line-through">IDR <?= number_format($tour['price'], 0, ',', '.') ?></p>
                        </td>
                        
                        <td class="px-6 py-4">
                            <span class="text-xs font-medium bg-blue-50 text-blue-600 px-2 py-1 rounded-md border border-blue-100">
                                <?= $tour['duration'] ?> Hari
                            </span>
                        </td>
                        
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="<?= base_url('admin/tours/edit/' . $tour['id']) ?>" class="p-2 bg-gray-100 text-slate-600 rounded-lg hover:bg-blue-100 hover:text-blue-600 transition" title="Edit Data">
                                    <i data-lucide="edit-2" class="w-4 h-4"></i>
                                </a>
                                
                                <a href="<?= base_url('admin/tours/delete/' . $tour['id']) ?>" onclick="return confirm('Yakin ingin menghapus tur ini? Data yang dihapus tidak bisa dikembalikan.')" class="p-2 bg-red-50 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition" title="Hapus Data">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                            <div class="bg-gray-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i data-lucide="map" class="w-8 h-8 opacity-30"></i>
                            </div>
                            <p class="font-bold text-sm text-slate-500">Belum ada paket wisata.</p>
                            <p class="text-xs text-slate-400 mb-4">Silakan tambahkan paket tur pertama Anda.</p>
                            <a href="<?= base_url('admin/tours/create') ?>" class="text-[#5C4033] text-xs font-bold hover:underline">Tambah Sekarang</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>