<?php

namespace App\Models;

use CodeIgniter\Model;

class TourModel extends Model
{
    protected $table      = 'tours';
    protected $primaryKey = 'id';

    // Daftar semua kolom database yang boleh diisi lewat kodingan
    // Pastikan 'location' dan 'category' ada di sini!
    protected $allowedFields = [
        'name', 
        'location',       // <--- Kolom Baru
        'category',       // <--- Kolom Baru
        'description', 
        'image_url', 
        'price', 
        'discount_price', 
        'duration', 
        'capacity'
    ];

    // Opsi Tambahan (Boleh ada boleh tidak, default false)
    // Jika Anda ingin CI4 otomatis mengisi created_at & updated_at:
    // protected $useTimestamps = true;
}