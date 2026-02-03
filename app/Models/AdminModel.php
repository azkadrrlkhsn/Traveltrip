<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    // Pastikan ini 'admins' (jamak), BUKAN 'admin'
    // Pastikan di phpMyAdmin tulisannya juga 'admins'
    protected $table = 'admins'; 
    
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];
}