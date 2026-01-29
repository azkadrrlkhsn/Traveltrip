<?php

namespace App\Controllers;

use App\Models\FlightModel;
use App\Models\PemesananModel;

class Booking extends BaseController
{
    /**
     * 1. Halaman Form Booking (GET)
     * Menampilkan detail penerbangan dan form isian data diri.
     */
    public function detail($id_tiket)
    {
        // 1. CEK LOGIN
        if (!session()->get('is_logged_in')) {
            // User belum login! 
            
            // Simpan URL halaman booking ini ke session agar nanti bisa balik lagi
            session()->set('redirect_url', '/pesan/' . $id_tiket);
            
            // Lempar ke halaman login dengan pesan
            return redirect()->to('/login')->with('error', 'Silakan Login atau Daftar untuk melanjutkan pemesanan.');
        }

        // ... (Kode selanjutnya sama seperti sebelumnya / ambil data flight) ...
        $flightModel = new FlightModel();
        $tiket = $flightModel->find($id_tiket);
        // ... dst
    }

    /**
     * 2. Proses Simpan & Kirim Email (POST)
     * Menangkap input form, menyimpan ke DB, dan mengirim notifikasi email.
     */
    // 2. Proses Simpan ke Database (POST)
    public function proses()
    {
        // --- BAGIAN INI YANG HILANG SEBELUMNYA ---
        $pemesananModel = new PemesananModel();
        
        // Generate Kode Booking Unik
        $kode_booking = 'TRP-' . rand(10000, 99999);
        // ------------------------------------------

        $data = [
            'kode_booking'   => $kode_booking,
            'flight_id'      => $this->request->getPost('flight_id'),
            'nama_pemesan'   => $this->request->getPost('nama_pemesan'),
            'no_hp'          => $this->request->getPost('no_hp'),
            'email'          => $this->request->getPost('email'),
            'nama_penumpang' => $this->request->getPost('nama_penumpang'),
            'total_bayar'    => $this->request->getPost('total_bayar'),
            'status'         => 'Menunggu Pembayaran', // Status awal
            'created_at'     => date('Y-m-d H:i:s')
        ];

        $pemesananModel->save($data);

        // Redirect ke Halaman Pembayaran (Payment), bukan Sukses
        return redirect()->to('/booking/payment/' . $kode_booking);
    }

    /**
     * 3. Halaman Sukses / E-Tiket (GET)
     * Menampilkan konfirmasi keberhasilan dan ringkasan tiket.
     */
    public function sukses($kode_booking)
    {
        $pemesananModel = new PemesananModel();
        $flightModel = new FlightModel();

        // Cari data pesanan berdasarkan Kode Booking
        $pesanan = $pemesananModel->where('kode_booking', $kode_booking)->first();
        
        // Validasi: Jika kode booking tidak ada
        if(!$pesanan) {
            return redirect()->to('/');
        }

        // Ambil detail penerbangan terkait
        $penerbangan = $flightModel->find($pesanan['flight_id']);

        return view('booking_success', [
            'pesanan' => $pesanan,
            'flight' => $penerbangan
        ]);
    }

    // 4. Halaman Pilih Pembayaran (GET)
    public function payment($kode_booking)
    {
        $pemesananModel = new PemesananModel();
        $pesanan = $pemesananModel->where('kode_booking', $kode_booking)->first();

        if(!$pesanan) return redirect()->to('/');

        // Format Rupiah untuk tampilan
        $pesanan['total_formatted'] = 'Rp ' . number_format($pesanan['total_bayar'], 0, ',', '.');

        return view('booking_payment', ['p' => $pesanan]);
    }

    // 5. Proses Verifikasi Pembayaran (POST)
    public function verifikasi()
    {
        $kode_booking = $this->request->getPost('kode_booking');
        $metode_bayar = $this->request->getPost('metode_bayar'); // Misal: BCA, QRIS

        $pemesananModel = new PemesananModel();
        
        // Ambil data pesanan
        $pesanan = $pemesananModel->where('kode_booking', $kode_booking)->first();

        // Update Status jadi Lunas
        $pemesananModel->update($pesanan['id'], ['status' => 'Lunas']);

        // BARU KIRIM EMAIL DISINI (Pindahkan logika email kesini)
        // Kita perlu data array lengkap untuk kirim email
        $data_email = [
            'nama_pemesan' => $pesanan['nama_pemesan'],
            'nama_penumpang' => $pesanan['nama_penumpang'],
            'total_bayar' => $pesanan['total_bayar']
        ];
        
        $this->kirimEmailTiket($pesanan['email'], $kode_booking, $data_email);

        // Redirect ke Sukses
        return redirect()->to('/booking/sukses/' . $kode_booking);
    }

    /**
     * Fungsi Private untuk Mengirim Email
     * Dipisahkan agar kode utama lebih bersih.
     */
    private function kirimEmailTiket($email_tujuan, $kode, $data)
    {
        $email = \Config\Services::email();

        $email->setTo($email_tujuan);
        $email->setSubject('E-Tiket Tripio: ' . $kode);
        
        // Template Email Sederhana (HTML)
        $message = "
            <div style='font-family: Arial, sans-serif; padding: 20px; border: 1px solid #eee; border-radius: 10px;'>
                <h2 style='color: #0c4a6e;'>Terima Kasih, {$data['nama_pemesan']}!</h2>
                <p>Pemesanan tiket Anda telah berhasil dikonfirmasi.</p>
                
                <div style='background: #f0f9ff; padding: 15px; border-radius: 8px; margin: 20px 0;'>
                    <p style='margin: 5px 0;'><strong>Kode Booking:</strong> <span style='font-size: 18px; color: #0284c7;'>{$kode}</span></p>
                    <p style='margin: 5px 0;'><strong>Penumpang:</strong> {$data['nama_penumpang']}</p>
                    <p style='margin: 5px 0;'><strong>Total Bayar:</strong> Rp " . number_format($data['total_bayar'], 0, ',', '.') . "</p>
                </div>

                <p>Silakan tunjukkan kode booking ini saat check-in di bandara.</p>
                <hr style='border: 0; border-top: 1px solid #eee;'>
                <p style='font-size: 12px; color: #888;'>© 2026 Tripio Travel Official</p>
            </div>
        ";
        
        $email->setMessage($message);

        // Gunakan Try-Catch agar jika internet mati/SMTP error, aplikasi TIDAK crash
        try {
            $email->send();
        } catch (\Exception $e) {
            // Email gagal dikirim? Tidak masalah, lanjut saja ke halaman sukses.
            // Di production, error ini bisa dicatat di log: log_message('error', $e->getMessage());
        }
    }
}