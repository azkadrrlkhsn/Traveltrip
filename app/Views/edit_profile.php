<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto px-6 py-12">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="<?= base_url('user/profile') ?>" class="p-2 rounded-full hover:bg-gray-100 transition">
            <i data-lucide="arrow-left" class="w-6 h-6 text-slate-800"></i>
        </a>
        <h1 class="text-2xl font-bold text-slate-800">Edit Profil</h1>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
        
        <form action="<?= base_url('user/update') ?>" method="post" class="space-y-6">
            
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase mb-2">Email Akun</label>
                <div class="flex items-center gap-3 bg-gray-50 px-4 py-3 rounded-xl border border-gray-200 cursor-not-allowed">
                    <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
                    <span class="text-slate-500 font-bold"><?= $user['email'] ?></span>
                    <span class="ml-auto text-[10px] bg-blue-100 text-blue-600 px-2 py-1 rounded font-bold">GOOGLE</span>
                </div>
                <p class="text-[10px] text-slate-400 mt-1 italic">*Email terhubung dengan Google, tidak dapat diubah.</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="<?= $user['name'] ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-[#5C4033] transition font-bold text-slate-800">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nomor WhatsApp / HP</label>
                <div class="relative">
                    <span class="absolute left-4 top-3.5 text-slate-400 font-bold">+62</span>
                    <input type="number" name="phone" value="<?= $user['phone'] ?>" placeholder="812xxxx" class="w-full border border-gray-300 rounded-xl pl-12 pr-4 py-3 focus:outline-none focus:border-[#5C4033] transition font-bold text-slate-800">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Alamat Domisili</label>
                <textarea name="address" rows="3" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-[#5C4033] transition text-slate-800"><?= $user['address'] ?></textarea>
            </div>

            <button type="submit" class="w-full bg-[#5C4033] text-white font-bold py-4 rounded-xl hover:bg-black transition shadow-lg flex justify-center gap-2">
                <i data-lucide="save" class="w-5 h-5"></i> Simpan Perubahan
            </button>

        </form>
    </div>
</div>

<?= $this->endSection() ?>