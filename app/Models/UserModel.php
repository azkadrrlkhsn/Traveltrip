<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    // Daftar kolom yang boleh diisi oleh aplikasi
    protected $allowedFields = [
        'nama_lengkap', 
        'email', 
        'password', 
        'no_hp',
        'google_id',   // Untuk login Google
        'foto_profil'  // Untuk foto dari Google
    ];

    // Mengaktifkan fitur timestamp otomatis (created_at)
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // Kita tidak pakai updated_at dulu
}