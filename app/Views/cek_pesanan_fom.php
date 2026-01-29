<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="min-h-[70vh] flex flex-col items-center justify-center px-6">
    
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-tripio-900">Cek Pesanan Saya</h1>
        <p class="text-slate-500 text-sm mt-2">Masukkan Kode Booking & Email untuk melihat E-Tiket.</p>
    </div>

    <div class="bg-white w-full max-w-md p-8 rounded-3xl border border-slate-100 shadow-xl relative">
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-50 text-red-600 text-xs font-bold p-3 rounded-xl mb-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5 .75.75 0 000 1.5z" clip-rule="evenodd" /></svg>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('cek-pesanan/cari') ?>" method="get">
            
            <div class="mb-4">
                <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Kode Booking</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-tripio-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd" /></svg>
                    </div>
                    <input type="text" name="kode_booking" required class="block w-full py-3 pl-12 pr-4 text-tripio-900 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tripio-500 font-mono font-bold placeholder-slate-400" placeholder="Contoh: TRP-12345">
                </div>
            </div>

            <div class="mb-8">
                <label class="block text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Email Pemesan</label>
                <div class="relative">
                     <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-tripio-500">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" /><path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" /></svg>
                    </div>
                    <input type="email" name="email" required class="block w-full py-3 pl-12 pr-4 text-tripio-900 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-tripio-500 font-bold placeholder-slate-400" placeholder="Email saat booking">
                </div>
            </div>

            <button type="submit" class="w-full bg-tripio-600 hover:bg-tripio-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-tripio-200 transition transform hover:-translate-y-1">
                Cari Tiket Saya
            </button>

        </form>
    </div>
</div>

<?= $this->endSection() ?>