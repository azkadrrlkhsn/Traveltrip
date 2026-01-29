<?php

namespace App\Controllers;

use App\Models\PemesananModel;

class Akun extends BaseController
{
    public function index()
    {
        // Cek Login
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login');
        }

        // Ambil riwayat pesanan berdasarkan email user yang login
        $pemesananModel = new PemesananModel();
        $emailUser = session()->get('email');
        
        // Ambil data sort by terbaru
        $riwayat = $pemesananModel->where('email', $emailUser)
                                  ->orderBy('created_at', 'DESC')
                                  ->findAll();

        return view('akun_dashboard', ['riwayat' => $riwayat]);
    }
}