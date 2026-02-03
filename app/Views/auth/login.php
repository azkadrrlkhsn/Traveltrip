<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tripio Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-lg border border-gray-100">
        
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">Selamat Datang</h1>
            <p class="text-slate-500 text-sm mt-1">Silakan login untuk melanjutkan</p>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-50 text-red-600 p-3 rounded-xl text-sm mb-6 border border-red-100 flex items-center gap-2">
                ⚠️ <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/process') ?>" method="post" class="space-y-5">
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Username Admin</label>
                <input type="text" name="username" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500 transition" placeholder="Masukkan username">
            </div>
            
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500 transition" placeholder="••••••••">
            </div>

            <button type="submit" class="w-full bg-[#5C4033] text-white font-bold py-3 rounded-xl hover:bg-slate-800 transition shadow-lg">
                Masuk sebagai Admin
            </button>
        </form>

        <div class="mt-8">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-400 font-medium">Atau masuk sebagai User</span>
                </div>
            </div>

            <div class="mt-6">
                <a href="<?= base_url('auth/google_login') ?>" class="w-full flex items-center justify-center gap-3 px-4 py-3 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-bold text-slate-700 hover:bg-gray-50 transition">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="h-5 w-5">
                    Masuk dengan Google
                </a>
            </div>
        </div>

    </div>

</body>
</html>