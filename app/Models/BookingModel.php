<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table      = 'bookings';
    protected $primaryKey = 'id';

    // DAFTAR KOLOM YANG BOLEH DIISI (WHITELIST)
    // Jika kolom tidak ada di sini, data tidak akan tersimpan!
    protected $allowedFields = [
        'tour_id', 
        'user_name', 
        'user_email', 
        'status', 
        'booking_date',
        // --- TAMBAHAN BARU ---
        'quantity', 
        'total_price', 
        'proof_image' // <--- Ini kuncinya agar gambar tersimpan
    ];

    protected $useTimestamps = false;
}