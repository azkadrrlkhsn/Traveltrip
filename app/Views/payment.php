<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="max-w-5xl mx-auto px-6 py-12">
    <div class="flex items-center gap-3 mb-8">
        <a href="<?= base_url('/') ?>" class="p-2 bg-slate-100 rounded-full hover:bg-slate-200 transition">
            <i data-lucide="arrow-left" class="w-5 h-5 text-slate-700"></i>
        </a>
        <h1 class="text-2xl font-bold text-slate-800">Selesaikan Pembayaran</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        
        <div class="lg:col-span-2 space-y-8">
            
            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
                <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <i data-lucide="credit-card" class="w-5 h-5 text-[#5C4033]"></i>
                    Transfer Manual ke Rekening Tripio
                </h3>
                <div class="p-4 bg-blue-50 border border-blue-100 rounded-xl mb-4">
                    <p class="text-sm text-blue-800 leading-relaxed">
                        Silakan transfer sesuai <b>Total Bayar</b> ke salah satu rekening di bawah ini, lalu upload bukti transfernya.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="border border-gray-200 p-4 rounded-xl flex items-center gap-4 hover:border-[#5C4033] transition cursor-pointer group">
                        <div class="w-12 h-12 bg-white border border-gray-100 rounded-lg flex items-center justify-center p-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/1200px-Bank_Central_Asia.svg.png" class="w-full">
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase">Bank BCA</p>
                            <p class="text-lg font-extrabold text-slate-800 tracking-wide">123-456-7890</p>
                            <p class="text-xs text-slate-500">a.n PT Tripio Indonesia</p>
                        </div>
                    </div>

                    <div class="border border-gray-200 p-4 rounded-xl flex items-center gap-4 hover:border-[#5C4033] transition cursor-pointer group">
                        <div class="w-12 h-12 bg-white border border-gray-100 rounded-lg flex items-center justify-center p-2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/1200px-Bank_Mandiri_logo_2016.svg.png" class="w-full">
                        </div>
                        <div>
                            <p class="text-xs text-slate-500 font-bold uppercase">Bank Mandiri</p>
                            <p class="text-lg font-extrabold text-slate-800 tracking-wide">987-000-1111</p>
                            <p class="text-xs text-slate-500">a.n PT Tripio Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm">
                <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <i data-lucide="upload-cloud" class="w-5 h-5 text-[#5C4033]"></i>
                    Konfirmasi Pembayaran
                </h3>

                <form action="<?= base_url('booking/process') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?> <input type="hidden" name="tour_id" value="<?= $tour['id'] ?>">
                    <input type="hidden" name="quantity" value="<?= $quantity ?>">
                    <input type="hidden" name="total_price" value="<?= $total_price ?>">

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Upload Bukti Transfer</label>
                        <input type="file" name="proof_image" class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:outline-none focus:border-[#5C4033] file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-[#5C4033] file:text-white hover:file:bg-black transition" required accept="image/*">
                        <p class="text-xs text-slate-400 mt-2">*Format: JPG, PNG, JPEG. Maks 2MB.</p>
                    </div>

                    <button type="submit" class="w-full bg-[#5C4033] text-white py-4 rounded-xl font-bold text-lg hover:bg-black transition shadow-lg flex items-center justify-center gap-2">
                        Kirim Bukti Pembayaran <i data-lucide="send" class="w-5 h-5"></i>
                    </button>
                </form>
            </div>
        </div>

        <div>
            <div class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm sticky top-24">
                <h3 class="font-bold text-slate-800 mb-4 pb-4 border-b border-gray-100">Ringkasan Pesanan</h3>
                
                <div class="flex gap-4 mb-4">
                    <img src="<?= $tour['image_url'] ?>" class="w-20 h-20 rounded-lg object-cover bg-gray-100">
                    <div>
                        <h4 class="font-bold text-sm text-slate-800 line-clamp-2"><?= $tour['name'] ?></h4>
                        <p class="text-xs text-slate-500 mt-1"><i data-lucide="map-pin" class="w-3 h-3 inline"></i> <?= $tour['location'] ?></p>
                    </div>
                </div>

                <div class="space-y-3 text-sm text-slate-600 mb-6">
                    <div class="flex justify-between">
                        <span>Tanggal Berangkat</span>
                        <span class="font-bold text-slate-800"><?= date('d M Y', strtotime($travel_date)) ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Harga per pax</span>
                        <span>Rp <?= number_format($tour['discount_price'], 0, ',', '.') ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Jumlah Peserta</span>
                        <span>x <?= $quantity ?> Orang</span>
                    </div>
                </div>

                <div class="p-4 bg-[#F8FAFC] rounded-xl border border-dashed border-gray-300">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold text-slate-600">Total Tagihan</span>
                        <span class="text-xl font-extrabold text-[#5C4033]">Rp <?= number_format($total_price, 0, ',', '.') ?></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>