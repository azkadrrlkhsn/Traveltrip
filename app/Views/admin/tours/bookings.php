<?= $this->extend('layout/admin_layout') ?>

<?= $this->section('content') ?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Kelola Pesanan</h1>
        <p class="text-slate-500 text-sm">Verifikasi bukti pembayaran masuk.</p>
    </div>
</div>

<?php if(session()->getFlashdata('message')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-slate-700 font-bold uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Pemesan</th>
                    <th class="px-6 py-4">Paket Wisata</th>
                    <th class="px-6 py-4">Total & Bukti</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach($bookings as $b): ?>
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 font-mono text-xs">#<?= $b['id'] ?></td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-slate-800"><?= $b['user_name'] ?></p>
                        <p class="text-xs text-slate-500"><?= $b['user_email'] ?></p>
                        <p class="text-xs text-slate-400 mt-1"><?= date('d M Y H:i', strtotime($b['booking_date'])) ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="font-bold block"><?= $b['tour_name'] ?></span>
                        <span class="text-xs bg-blue-50 text-blue-600 px-2 py-1 rounded mt-1 inline-block">
                            x <?= $b['quantity'] ?> Org
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-[#5C4033] mb-2">Rp <?= number_format($b['total_price'], 0, ',', '.') ?></p>
                        
                        <?php if(!empty($b['proof_image'])): ?>
                            <button onclick="showProof('<?= base_url('uploads/payments/'.$b['proof_image']) ?>')" 
                                    class="flex items-center gap-1 text-xs font-bold text-blue-600 hover:underline bg-blue-50 px-2 py-1 rounded border border-blue-100 transition hover:bg-blue-100">
                                <i data-lucide="image" class="w-3 h-3"></i> Lihat Bukti
                            </button>
                        <?php else: ?>
                            <span class="text-xs text-red-400 italic">Belum upload</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php if($b['status'] == 'pending'): ?>
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold border border-yellow-200 animate-pulse">
                                ⏳ Menunggu
                            </span>
                        <?php elseif($b['status'] == 'confirmed'): ?>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200">
                                ✅ Lunas
                            </span>
                        <?php else: ?>
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200">
                                ❌ Ditolak
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <?php if($b['status'] == 'pending'): ?>
                                <form action="<?= base_url('admin/confirm/'.$b['id']) ?>" method="post">
                                    <button type="submit" class="w-8 h-8 rounded bg-green-500 text-white flex items-center justify-center hover:bg-green-600 transition shadow-sm" title="Terima">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                <form action="<?= base_url('admin/reject/'.$b['id']) ?>" method="post">
                                    <button type="submit" class="w-8 h-8 rounded bg-yellow-500 text-white flex items-center justify-center hover:bg-yellow-600 transition shadow-sm" title="Tolak">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                            
                            <a href="<?= base_url('admin/bookings/delete/'.$b['id']) ?>" onclick="return confirm('Hapus permanen?')" class="w-8 h-8 rounded bg-red-50 text-red-500 border border-red-100 flex items-center justify-center hover:bg-red-500 hover:text-white transition shadow-sm" title="Hapus">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <?php if(empty($bookings)): ?>
            <div class="p-8 text-center text-slate-400">
                <i data-lucide="inbox" class="w-12 h-12 mx-auto mb-2 opacity-50"></i>
                <p>Belum ada pesanan masuk.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<div id="proofModal" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-sm items-center justify-center p-4" onclick="closeModal()">
    <div class="relative bg-white p-2 rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden shadow-2xl animate-fade-in" onclick="event.stopPropagation()">
        
        <div class="flex justify-between items-center p-2 mb-2 border-b border-gray-100">
            <h3 class="font-bold text-slate-700">Bukti Transfer</h3>
            <button onclick="closeModal()" class="p-1 hover:bg-gray-100 rounded-full transition">
                <i data-lucide="x" class="w-5 h-5 text-slate-500"></i>
            </button>
        </div>

        <div class="w-full h-auto overflow-y-auto max-h-[80vh] bg-slate-100 rounded-xl flex items-center justify-center min-h-[200px]">
            <img id="modalImage" src="" class="max-w-full object-contain">
        </div>

        <div class="mt-4 flex justify-end gap-2 px-2 pb-2">
            <button onclick="closeModal()" class="px-4 py-2 bg-slate-100 text-slate-600 font-bold rounded-lg hover:bg-slate-200 transition">Tutup</button>
            <a id="downloadLink" href="" download class="px-4 py-2 bg-[#5C4033] text-white font-bold rounded-lg hover:bg-black transition flex items-center gap-2">
                <i data-lucide="download" class="w-4 h-4"></i> Unduh
            </a>
        </div>
    </div>
</div>

<script>
    function showProof(imageUrl) {
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('downloadLink').href = imageUrl;
        
        var modal = document.getElementById('proofModal');
        
        // Hapus 'hidden', Tambah 'flex' lewat JS agar tidak conflict di HTML
        modal.classList.remove('hidden');
        modal.classList.add('flex'); 
    }

    function closeModal() {
        var modal = document.getElementById('proofModal');
        
        // Kembalikan ke hidden, Hapus flex
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
    .animate-fade-in {
        animation: fade-in 0.2s ease-out forwards;
    }
</style>

<?= $this->endSection() ?>