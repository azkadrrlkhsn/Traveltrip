<?php

namespace App\Controllers;

// PENTING: Baris ini mengatasi error "Undefined type UserModel"
use App\Models\UserModel;
// Import Library Google yang baru
use League\OAuth2\Client\Provider\Google;

class Auth extends BaseController
{
    // =========================================================================
    // BAGIAN 1: AUTHENTICATION MANUAL (Email & Password)
    // =========================================================================

    public function login()
    {
        if (session()->get('is_logged_in')) {
            return redirect()->to('/');
        }
        return view('auth_login');
    }

    public function prosesLogin()
    {
        $model = new UserModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $user = $model->where('email', $email)->first();
        
        if ($user) {
            // Verifikasi Password (jika user punya password)
            if (!empty($user['password']) && password_verify($password, $user['password'])) {
                $this->setUserSession($user);
                return $this->cekRedirectUrl(); 
            }
        }
        
        return redirect()->to('/login')->with('error', 'Email atau Password salah.');
    }

    public function register()
    {
        if (session()->get('is_logged_in')) {
            return redirect()->to('/');
        }
        return view('auth_register');
    }

    public function prosesRegister()
    {
        $model = new UserModel();
        
        if (!$this->validate([
            'email' => 'required|valid_email|is_unique[users.email]',
        ])) {
            return redirect()->to('/register')->with('error', 'Email sudah terdaftar atau tidak valid.');
        }

        $data = [
            'nama_lengkap' => $this->request->getPost('nama'),
            'email'        => $this->request->getPost('email'),
            'no_hp'        => $this->request->getPost('hp'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $model->save($data);
        
        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    // =========================================================================
    // BAGIAN 2: GOOGLE LOGIN (VERSI LEAGUE/OAUTH2)
    // =========================================================================

    public function googleLogin()
    {
        $provider = new Google([
            'clientId'     => getenv('GOOGLE_CLIENT_ID'),
            'clientSecret' => getenv('GOOGLE_CLIENT_SECRET'),
            'redirectUri'  => base_url('auth/google/callback'),
        ]);

        return redirect()->to($provider->getAuthorizationUrl());
    }

    public function googleCallback()
    {
        $provider = new Google([
            'clientId'     => getenv('GOOGLE_CLIENT_ID'),
            'clientSecret' => getenv('GOOGLE_CLIENT_SECRET'),
            'redirectUri'  => base_url('auth/google/callback'),
        ]);

        if (! $this->request->getGet('code')) {
            return redirect()->to('/login')->with('error', 'Login Google dibatalkan.');
        }

        try {
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $this->request->getGet('code')
            ]);

            // CATATAN: Jika bagian ini masih merah di VS Code, abaikan saja.
            // Ini adalah object dari library League yang kodenya sudah benar.
            $userGoogle = $provider->getResourceOwner($token);
            $email = $userGoogle->getEmail();
            $name  = $userGoogle->getName();
            $picture = $userGoogle->getAvatar();
            $google_id = $userGoogle->getId();

            // Logika Database
            $model = new UserModel();
            $user = $model->where('email', $email)->first();

            if ($user) {
                // User Lama: Update info Google
                $updateData = [];
                if (empty($user['google_id'])) $updateData['google_id'] = $google_id;
                if (empty($user['foto_profil'])) $updateData['foto_profil'] = $picture;
                
                if (!empty($updateData)) {
                    $model->update($user['id'], $updateData);
                }
                $user = $model->find($user['id']);
            } else {
                // User Baru: Register
                $newUser = [
                    'nama_lengkap' => $name,
                    'email'        => $email,
                    'google_id'    => $google_id,
                    'foto_profil'  => $picture,
                    'password'     => null,
                ];
                $model->save($newUser);
                $user = $model->where('email', $email)->first();
            }

            $this->setUserSession($user);
            return $this->cekRedirectUrl();

        } catch (\Exception $e) {
            return redirect()->to('/login')->with('error', 'Gagal login Google: ' . $e->getMessage());
        }
    }

    // =========================================================================
    // BAGIAN 3: FUNGSI BANTUAN
    // =========================================================================

    private function setUserSession($user)
    {
        $data = [
            'user_id'      => $user['id'],
            'nama'         => $user['nama_lengkap'],
            'email'        => $user['email'],
            'foto'         => $user['foto_profil'] ?? null,
            'is_logged_in' => true
        ];
        session()->set($data);
    }

    private function cekRedirectUrl()
    {
        if (session()->has('redirect_url')) {
            $url = session()->get('redirect_url');
            session()->remove('redirect_url');
            return redirect()->to($url);
        }
        return redirect()->to('/');
    }
}