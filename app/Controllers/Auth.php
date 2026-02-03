<?php

namespace App\Controllers;

use App\Models\AdminModel;
use Google\Client as GoogleClient;
use Google\Service\Oauth2 as GoogleService;

class Auth extends BaseController
{
    // =================================================================
    // 1. HALAMAN LOGIN UTAMA
    // =================================================================
    // URL: http://localhost:8080/login
    public function login()
    {
        // Jika sudah login, lempar langsung ke Home
        if (session()->get('is_user_logged_in')) {
            return redirect()->to('/');
        }
        return view('auth/login');
    }

    // =================================================================
    // 2. PROSES LOGIN ADMIN (Password Manual)
    // =================================================================
    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Contoh sederhana Admin (Bisa diganti dengan Database AdminModel)
        if ($username === 'admin' && $password === 'admin123') {
            session()->set('is_admin_logged_in', true);
            return redirect()->to('admin');
        }

        return redirect()->back()->with('error', 'Username atau Password salah.');
    }

    // =================================================================
    // 3. PROSES LOGIN GOOGLE (Otomatis)
    // =================================================================
    
    // A. Mengarahkan User ke Halaman Login Google
    public function google_login()
    {
        $client = new GoogleClient();
        
        // Mengambil ID dari .env
        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        
        $client->setRedirectUri(base_url('auth/google_callback'));
        $client->addScope('email');
        $client->addScope('profile');

        return redirect()->to($client->createAuthUrl());
    }

    // B. Menerima Data Balik dari Google
    public function google_callback()
    {
        $client = new GoogleClient();
        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(base_url('auth/google_callback'));

        // Ambil Code Tiket dari URL
        $code = $this->request->getVar('code');

        if ($code) {
            try {
                // Tukar Code dengan Token
                $token = $client->fetchAccessTokenWithAuthCode($code);
                $client->setAccessToken($token);

                // Ambil Data Profil User dari Google
                $googleService = new GoogleService($client);
                $googleUser = $googleService->userinfo->get();

                // Cek Database (Simpan user jika baru)
                $db = \Config\Database::connect();
                $builder = $db->table('users');
                $existingUser = $builder->getWhere(['email' => $googleUser->email])->getRowArray();

                if ($existingUser) {
                    $userData = [
                        'id' => $existingUser['id'],
                        'name' => $existingUser['name'],
                        'email' => $existingUser['email'],
                        'picture' => $googleUser->picture
                    ];
                } else {
                    $newData = [
                        'google_id' => $googleUser->id,
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'picture' => $googleUser->picture
                    ];
                    $builder->insert($newData);
                    
                    $userData = $newData;
                    $userData['id'] = $db->insertID();
                }

                // --- BAGIAN TERPENTING (SIMPAN KE SESSION) ---
                // Pastikan kuncinya persis 'user_name' dan 'user_email'
                session()->set([
                    'is_user_logged_in' => true,
                    'user_id'      => $userData['id'],
                    'user_name'    => $userData['name'],   // <--- Ini yang dipakai payment.php
                    'user_email'   => $userData['email'],  // <--- Ini yang dipakai payment.php
                    'user_picture' => $userData['picture']
                ]);

                return redirect()->to('/');

            } catch (\Exception $e) {
                // Jika error (misal token kadaluarsa), kembalikan ke login
                return redirect()->to('login')->with('error', 'Gagal login Google: ' . $e->getMessage());
            }
        } else {
            return redirect()->to('login');
        }
    }

    // =================================================================
    // 4. LOGOUT
    // =================================================================
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}