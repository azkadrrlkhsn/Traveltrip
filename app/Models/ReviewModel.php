<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'tour_id', 'rating', 'comment', 'created_at'];

    // Ambil review + nama user (Join Table)
    public function getReviewsByTour($tourId)
    {
        return $this->select('reviews.*, users.name as user_name')
                    ->join('users', 'users.id = reviews.user_id')
                    ->where('tour_id', $tourId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}