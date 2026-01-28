<?php

namespace App\Controllers;

use App\Models\FlightModel; // Load Model

class Search extends BaseController
{
    public function index()
    {
        $flightModel = new FlightModel();

        // 1. Tangkap Input User
        // Default ke 'Jakarta' dan 'Bali' jika kosong
        $keyword_asal = $this->request->getGet('asal') ?: 'Jakarta';
        $keyword_tujuan = $this->request->getGet('tujuan') ?: 'Bali';
        $tanggal_raw = $this->request->getGet('tanggal');
        
        // Format Tanggal Cantik
        $tanggal_display = $tanggal_raw ? date('d M Y', strtotime($tanggal_raw)) : 'Besok';

        // 2. Cari Data di Database (REAL DATA)
        // Kita pecah string input, misal "Jakarta (CGK)" diambil "Jakarta"-nya saja
        $asal_bersih = explode(' ', trim($keyword_asal))[0]; 
        $tujuan_bersih = explode(' ', trim($keyword_tujuan))[0];

        $hasil_pencarian = $flightModel->cariPenerbangan($asal_bersih, $tujuan_bersih);

        // 3. Format Harga (Agar tampil Rp ...)
        foreach($hasil_pencarian as &$row) {
            $row['harga_formatted'] = 'Rp ' . number_format($row['harga'], 0, ',', '.');
        }

        $data = [
            'rute_asal' => $keyword_asal,
            'rute_tujuan' => $keyword_tujuan,
            'tanggal' => $tanggal_display,
            'tiket' => $hasil_pencarian, // Data dikirim ke View
            'jumlah_ditemukan' => count($hasil_pencarian)
        ];

        return view('search_result', $data);
    }
}