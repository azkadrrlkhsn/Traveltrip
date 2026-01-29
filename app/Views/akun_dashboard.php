<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="pb-20">
    <div class="bg-tripio-900 px-6 pt-8 pb-16 md:rounded-b-3xl">
        <div class="flex items-center gap-4">
            <?php $foto = session()->get('foto') ?: 'https://ui-avatars.com/api/?name='.urlencode(session()->get('nama')).'&background=random'; ?>
            <img src="<?= $foto ?>" alt="Profil" class="w-16 h-16 rounded-full border-2 border-white shadow-md object-cover">
            
            <div class="text-white">
                <h1 class="text-xl font-bold"><?= session()->get('nama') ?></h1>
                <p class="text-sm text-blue-200"><?= session()->get('email') ?></p>
            </div>
        </div>
    </div>

    <div class="px-6 -mt-8">
        <div class="bg-white rounded-2xl p-6 shadow-md border border-slate-100 flex justify-between mb-6">
            <div class="text-center w-1/2 border-r border-slate-100">
                <p class="text-2xl font-bold text-tripio-600"><?= count($riwayat) ?></p>
                <p class="text-xs text-slate-400">Total Tiket</p>
            </div>
            <div class="text-center w-1/2">
                <p class="text-2xl font-bold text-orange-500">0</p>
                <p class="text-xs text-slate-400">Poin Tripio</p>
            </div>
        </div>

        <h3 class="font-bold text-slate-800 mb-4">Riwayat Perjalanan</h3>

        <?php if(empty($riwayat)): ?>
            <div class="text-center py-10 bg-slate-50 rounded-2xl border border-slate-100 border-dashed">
                <p class="text-slate-400 text-sm">Belum ada perjalanan.</p>
                <a href="<?= base_url() ?>" class="text-tripio-600 font-bold text-sm mt-2 block">Cari Tiket Sekarang</a>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach($riwayat as $r): ?>
                <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex justify-between items-center">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs font-bold text-slate-500"><?= $r['kode_booking'] ?></span>
                            <?php 
                                $bgStatus = match($r['status']) {
                                    'Lunas' => 'bg-green-100 text-green-700',
                                    'Menunggu Pembayaran' => 'bg-orange-100 text-orange-700',
                                    default => 'bg-slate-100 text-slate-500'
                                };
                            ?>
                            <span class="<?= $bgStatus ?> text-[10px] px-2 py-0.5 rounded font-bold uppercase"><?= $r['status'] ?></span>
                        </div>
                        <h4 class="font-bold text-slate-800 text-sm">Tiket Pesawat</h4>
                        <p class="text-xs text-slate-400"><?= date('d M Y', strtotime($r['created_at'])) ?></p>
                    </div>
                    
                    <?php if($r['status'] == 'Lunas'): ?>
                        <a href="<?= base_url('booking/sukses/' . $r['kode_booking']) ?>" class="bg-tripio-50 text-tripio-600 px-4 py-2 rounded-xl text-xs font-bold hover:bg-tripio-100">
                            E-Tiket
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('booking/payment/' . $r['kode_booking']) ?>" class="bg-orange-50 text-orange-600 px-4 py-2 rounded-xl text-xs font-bold hover:bg-orange-100">
                            Bayar
                        </a>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <a href="<?= base_url('logout') ?>" class="block w-full text-center mt-8 py-3 text-red-500 font-bold text-sm border border-red-100 rounded-xl hover:bg-red-50 transition">
            Keluar Akun
        </a>
    </div>
</div>

<?= $this->endSection() ?>