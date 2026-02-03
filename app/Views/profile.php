<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto px-6 py-12">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="space-y-2">
            <a href="<?= base_url('user/profile') ?>" class="flex w-full items-center gap-3 px-4 py-3 bg-blue-50 text-blue-700 font-bold rounded-xl border border-blue-100 transition">
                <i data-lucide="user" class="w-5 h-5"></i> Akun Saya
            </a>

            <a href="<?= base_url('booking/history') ?>" class="flex w-full items-center gap-3 px-4 py-3 bg-white text-slate-600 font-medium rounded-xl border border-gray-100 hover:bg-gray-50 transition">
                <i data-lucide="history" class="w-5 h-5"></i> Riwayat Pesanan
            </a>

            <a href="#" class="flex w-full items-center gap-3 px-4 py-3 bg-white text-slate-600 font-medium rounded-xl border border-gray-100 hover:bg-gray-50 transition">
                <i data-lucide="heart" class="w-5 h-5"></i> Wishlist (Simpan)
            </a>

            <a href="<?= base_url('logout') ?>" class="flex w-full items-center gap-3 px-4 py-3 bg-white text-red-500 font-medium rounded-xl border border-gray-100 hover:bg-red-50 transition mt-8">
                <i data-lucide="log-out" class="w-5 h-5"></i> Keluar
            </a>
        </div>

        <div class="md:col-span-2">
            
            <?php if(session()->getFlashdata('message')): ?>
                <div class="bg-green-50 text-green-600 p-4 rounded-xl mb-4 border border-green-100 flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5"></i> <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>

            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                
                <div class="bg-[#5C4033] h-32 relative"></div>
                <div class="px-8 pb-8">
                    <div class="relative -mt-12 mb-6 flex justify-between items-end">
                        <div class="relative">
                            <?php if(!empty($user['picture'])): ?>
                                <img src="<?= $user['picture'] ?>" class="w-24 h-24 rounded-full border-4 border-white shadow-md bg-white object-cover">
                            <?php else: ?>
                                <div class="w-24 h-24 rounded-full border-4 border-white shadow-md bg-slate-200 flex items-center justify-center text-3xl font-bold text-slate-500">
                                    <?= substr($user['name'], 0, 1) ?>
                                </div>
                            <?php endif; ?>
                            <div class="absolute bottom-0 right-0 bg-green-500 w-6 h-6 rounded-full border-2 border-white" title="Online"></div>
                        </div>
                        
                        <a href="<?= base_url('user/edit') ?>" class="px-4 py-2 text-xs font-bold border border-gray-300 rounded-lg hover:bg-gray-50 transition bg-white flex items-center gap-2">
                            <i data-lucide="edit-3" class="w-3 h-3"></i> Edit Profil
                        </a>
                    </div>

                    <h2 class="text-2xl font-bold text-slate-800"><?= $user['name'] ?></h2>
                    <p class="text-slate-500 mb-6 flex items-center gap-2 text-sm">
                        <i data-lucide="mail" class="w-4 h-4"></i> <?= $user['email'] ?>
                        <span class="bg-blue-100 text-blue-600 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase">Google Account</span>
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-gray-100 pt-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Nomor Ponsel</label>
                            <p class="text-slate-800 font-medium">
                                <?= !empty($user['phone']) ? '+62 ' . $user['phone'] : '<span class="text-red-400 italic text-sm">Belum diisi</span>' ?>
                            </p>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Alamat</label>
                            <p class="text-slate-800 font-medium">
                                <?= !empty($user['address']) ? $user['address'] : '<span class="text-slate-400 italic text-sm">-</span>' ?>
                            </p>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-400 uppercase mb-1">Bergabung Sejak</label>
                            <p class="text-slate-800 font-medium">
                                <?= date('d F Y', strtotime($user['created_at'])) ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>