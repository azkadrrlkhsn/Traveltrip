<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\FlightModel;

class CekPesanan extends BaseController
{
    public function index()
    {
        return view('cek_pesanan_form');
    }

    public function cari()
    {
        $kode = $this->request->getGet('kode_booking');
        $email = $this->request->getGet('email');

        $pemesananModel = new PemesananModel();
        
        // Cari data berdasarkan Kode Booking DAN Email (Validasi ganda)
        $pesanan = $pemesananModel->where('kode_booking', $kode)
                                  ->where('email', $email)
                                  ->first();

        if (!$pesanan) {
            return redirect()->to('/cek-pesanan')->with('error', 'Data tidak ditemukan. Cek kembali Kode Booking dan Email Anda.');
        }

        // Jika ketemu, alihkan ke halaman sukses (E-Tiket) yang sudah kita buat
        return redirect()->to('/booking/sukses/' . $kode);
    }
}