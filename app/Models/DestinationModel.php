<?php namespace App\Models;
use CodeIgniter\Model;

class DestinationModel extends Model {
    protected $table = 'destinations';
    protected $allowedFields = ['name', 'location', 'category', 'image_url'];
}