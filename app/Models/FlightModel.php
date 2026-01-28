<?php

namespace App\Models;

use CodeIgniter\Model;

class FlightModel extends Model
{
    protected $table = 'penerbangan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'maskapai', 'kode_penerbangan', 
        'asal_kota', 'asal_kode', 
        'tujuan_kota', 'tujuan_kode', 
        'jam_berangkat', 'jam_tiba', 
        'durasi', 'harga', 'logo_color'
    ];
    
    // Fitur: Pencarian Pintar
    public function cariPenerbangan($asal, $tujuan)
    {
        // Mencari data yang asal/tujuannya mirip dengan input user
        return $this->like('asal_kota', $asal)
                    ->like('tujuan_kota', $tujuan)
                    ->findAll();
    }
}