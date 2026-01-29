<?php namespace App\Models;
use CodeIgniter\Model;

class TourModel extends Model {
    protected $table = 'tours';
    protected $allowedFields = ['name', 'description', 'price', 'discount_price', 'duration', 'capacity', 'image_url', 'tags'];
}