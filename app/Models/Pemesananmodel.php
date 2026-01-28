<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_booking', 'flight_id', 
        'nama_pemesan', 'no_hp', 'email', 
        'nama_penumpang', 'total_bayar', 'status'
    ];
}