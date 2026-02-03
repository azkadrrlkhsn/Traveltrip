<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
    <div class="hidden md:block h-20"></div> <div class="px-6 pt-8 pb-4 bg-white shadow-sm sticky top-0 z-40 md:hidden">
        <h1 class="text-2xl font-bold text-slate-800">Settings</h1>
    </div>

    <div class="px-6 md:px-12 py-6 max-w-xl mx-auto min-h-screen">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex items-center gap-4">
                <div class="w-12 h-12 bg-gray-200 rounded-full overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name=User&background=C19A6B&color=fff" class="w-full h-full">
                </div>
                <div>
                    <h3 class="font-bold text-slate-800">User Tamu</h3>
                    <p class="text-xs text-slate-400">user@tripio.com</p>
                </div>
            </div>
            <div class="divide-y divide-gray-50">
                <button class="w-full flex justify-between items-center p-4 hover:bg-gray-50 transition">
                    <span class="text-sm font-medium text-slate-600">Edit Profil</span>
                    <i data-lucide="chevron-right" class="w-4 h-4 text-gray-300"></i>
                </button>
                <button class="w-full flex justify-between items-center p-4 hover:bg-gray-50 transition">
                    <span class="text-sm font-medium text-slate-600">Bahasa / Language</span>
                    <span class="text-xs text-gray-400">Indonesia</span>
                </button>
                <button class="w-full flex justify-between items-center p-4 hover:bg-red-50 transition group">
                    <span class="text-sm font-medium text-red-500">Keluar Aplikasi</span>
                    <i data-lucide="log-out" class="w-4 h-4 text-red-300 group-hover:text-red-500"></i>
                </button>
            </div>
        </div>

        <p class="text-center text-[10px] text-gray-300 mt-8">Tripio App v1.0.0</p>
    </div>
<?= $this->endSection() ?>