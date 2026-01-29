<a href="<?= base_url('auth/google') ?>" class="w-full bg-white border border-slate-200 text-slate-600 font-bold py-3 rounded-xl shadow-sm hover:bg-slate-50 transition flex items-center justify-center gap-3 mb-6">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google">
            Masuk dengan Google
        </a>

        <div class="relative flex py-2 items-center mb-6">
            <div class="flex-grow border-t border-slate-200"></div>
            <span class="flex-shrink-0 mx-4 text-slate-400 text-xs">Atau pakai email</span>
            <div class="flex-grow border-t border-slate-200"></div>
        </div>

        ```

---

### LANGKAH 7: Tambah Route

Update `app/Config/Routes.php`:

```php
$routes->get('/auth/google', 'Auth::googleLogin');
$routes->get('/auth/google/callback', 'Auth::googleCallback');