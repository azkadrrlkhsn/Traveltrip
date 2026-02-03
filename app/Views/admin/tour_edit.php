<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="max-w-3xl mx-auto pb-20">
        <div class="flex items-center gap-4 mb-6">
            <a href="<?= base_url('admin/tours') ?>" class="p-2 bg-white border border-gray-200 rounded-full hover:bg-gray-50 transition">
                <i data-lucide="arrow-left" class="w-5 h-5 text-slate-600"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Edit Paket Tur</h1>
                <p class="text-xs text-slate-500">Ubah detail informasi paket wisata.</p>
            </div>
        </div>

        <form action="<?= base_url('admin/tours/update/' . $tour['id']) ?>" method="post" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            
            <div class="mb-8">
                <h3 class="font-bold text-slate-800 mb-4 border-b border-gray-100 pb-2 flex items-center gap-2">
                    <i data-lucide="info" class="w-4 h-4 text-[#4FC3F7]"></i> Informasi Dasar
                </h3>
                
                <div class="space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Paket</label>
                        <input type="text" name="name" value="<?= $tour['name'] ?>" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] focus:ring-4 focus:ring-[#4FC3F7]/10 font-bold text-slate-700 transition">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Lokasi / Negara</label>
                            <input type="text" name="location" value="<?= $tour['location'] ?>" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Kategori</label>
                            <input type="text" name="category" value="<?= $tour['category'] ?>" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Link Gambar (URL)</label>
                        <div class="flex gap-4 items-start">
                            <img src="<?= $tour['image_url'] ?>" class="w-20 h-20 rounded-lg object-cover bg-gray-100 border border-gray-200 flex-shrink-0">
                            <div class="w-full">
                                <input type="url" name="image_url" value="<?= $tour['image_url'] ?>" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] text-sm text-blue-600 mb-1 transition">
                                <p class="text-[10px] text-gray-400">Ganti URL di atas untuk mengubah gambar.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Deskripsi Lengkap</label>
                        <textarea name="description" rows="5" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] text-sm leading-relaxed transition"><?= $tour['description'] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="font-bold text-slate-800 mb-4 border-b border-gray-100 pb-2 flex items-center gap-2">
                    <i data-lucide="tag" class="w-4 h-4 text-[#4FC3F7]"></i> Harga & Fasilitas
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Harga Asli (Coret)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-gray-400 text-sm font-bold">Rp</span>
                            <input type="number" name="price" value="<?= $tour['price'] ?>" required class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:border-[#4FC3F7] transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Harga Diskon (Jual)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-[#D32F2F] text-sm font-bold">Rp</span>
                            <input type="number" name="discount_price" value="<?= $tour['discount_price'] ?>" required class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-3 focus:outline-none focus:border-[#4FC3F7] font-bold text-[#D32F2F] transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Durasi (Hari)</label>
                        <input type="number" name="duration" value="<?= $tour['duration'] ?>" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] transition">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Kapasitas (Org)</label>
                        <input type="number" name="capacity" value="<?= $tour['capacity'] ?>" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] transition">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-6">
                <a href="<?= base_url('admin/tours') ?>" class="px-6 py-3 rounded-xl text-sm font-bold text-slate-500 hover:bg-gray-100 transition">Batal</a>
                <button type="submit" class="bg-[#5C4033] text-white px-8 py-3 rounded-xl font-bold uppercase tracking-widest hover:bg-black transition shadow-lg flex items-center gap-2">
                    <i data-lucide="save" class="w-4 h-4"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

<?= $this->endSection() ?>