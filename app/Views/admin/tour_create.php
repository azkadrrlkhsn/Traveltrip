<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="<?= base_url('admin/tours') ?>" class="p-2 bg-white border border-gray-200 rounded-full hover:bg-gray-50">
                <i data-lucide="arrow-left" class="w-5 h-5 text-slate-600"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Tambah Paket Baru</h1>
        </div>

        <form action="<?= base_url('admin/tours/save') ?>" method="post" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            
            <div class="mb-8">
                <h3 class="font-bold text-slate-800 mb-4 border-b border-gray-100 pb-2">Informasi Dasar</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Paket Tur</label>
                        <input type="text" name="name" required placeholder="Contoh: Eksotisme Bali 3 Hari 2 Malam" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] font-bold text-slate-700">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Lokasi / Negara</label>
                            <input type="text" name="location" required placeholder="Contoh: Indonesia" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7]">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Kategori</label>
                            <input type="text" name="category" placeholder="Contoh: Pegunungan" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Link Gambar (URL)</label>
                        <input type="url" name="image_url" required placeholder="https://images.unsplash.com/..." class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] text-sm text-blue-600">
                        <p class="text-[10px] text-gray-400 mt-1">*Untuk saat ini gunakan link gambar dari Unsplash/Google dulu.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Deskripsi Lengkap</label>
                        <textarea name="description" rows="4" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] text-sm" placeholder="Jelaskan daya tarik wisata ini..."></textarea>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="font-bold text-slate-800 mb-4 border-b border-gray-100 pb-2">Harga & Fasilitas</h3>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Harga Asli (Coret)</label>
                        <input type="number" name="price" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Harga Diskon (Jual)</label>
                        <input type="number" name="discount_price" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7] font-bold text-[#D32F2F]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Durasi (Hari)</label>
                        <input type="number" name="duration" required placeholder="3" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Kapasitas (Org)</label>
                        <input type="number" name="capacity" required placeholder="10" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:border-[#4FC3F7]">
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-[#5C4033] text-white py-4 rounded-xl font-bold uppercase tracking-widest hover:bg-black transition shadow-lg">
                Simpan Paket Tur
            </button>

        </form>
    </div>

<?= $this->endSection() ?>