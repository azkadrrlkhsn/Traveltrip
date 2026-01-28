<?php

namespace App\Controllers;

use App\Models\FlightModel;
use App\Models\PemesananModel;

class Booking extends BaseController
{
    // 1. Halaman Form Booking (GET)
    public function detail($id_tiket)
    {
        $flightModel = new FlightModel();
        $tiket = $flightModel->find($id_tiket);

        if (!$tiket) {
            return redirect()->to('/')->with('error', 'Tiket tidak ditemukan');
        }

        // Format data untuk tampilan
        $tiket['harga_formatted'] = 'Rp ' . number_format($tiket['harga'], 0, ',', '.');
        $tiket['pajak'] = 50000; // Pajak flat simulasi
        $tiket['total_formatted'] = 'Rp ' . number_format($tiket['harga'] + 50000, 0, ',', '.');
        $tiket['total_angka'] = $tiket['harga'] + 50000;

        return view('booking_detail', ['t' => $tiket]);
    }

    // 2. Proses Simpan ke Database (POST)
    public function proses()
    {
        $pemesananModel = new PemesananModel();
        
        // Generate Kode Booking Unik (Contoh: TRP-88291)
        $kode_booking = 'TRP-' . rand(10000, 99999);

        $data = [
            'kode_booking'   => $kode_booking,
            'flight_id'      => $this->request->getPost('flight_id'),
            'nama_pemesan'   => $this->request->getPost('nama_pemesan'),
            'no_hp'          => $this->request->getPost('no_hp'),
            'email'          => $this->request->getPost('email'),
            'nama_penumpang' => $this->request->getPost('nama_penumpang'),
            'total_bayar'    => $this->request->getPost('total_bayar'),
            'status'         => 'Lunas' // Anggap langsung lunas untuk simulasi
        ];

        $pemesananModel->save($data);

        // Redirect ke halaman sukses
        return redirect()->to('/booking/sukses/' . $kode_booking);
    }

    // 3. Halaman Sukses / E-Tiket (GET)
    public function sukses($kode_booking)
    {
        $pemesananModel = new PemesananModel();
        $flightModel = new FlightModel();

        // Ambil data pesanan gabung dengan data penerbangan
        $pesanan = $pemesananModel->where('kode_booking', $kode_booking)->first();
        
        if(!$pesanan) return redirect()->to('/');

        $penerbangan = $flightModel->find($pesanan['flight_id']);

        return view('booking_success', [
            'pesanan' => $pesanan,
            'flight' => $penerbangan
        ]);
    }
}