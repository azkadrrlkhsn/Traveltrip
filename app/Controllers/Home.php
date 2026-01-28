<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Data simulasi (karena kita belum pakai Database)
        $data = [
            'promo_banner' => [
                'title' => 'Liburan ke Bali',
                'desc'  => 'Diskon 50% untuk penerbangan pertama!',
                'color' => 'bg-tripio-900' // Deep Blue
            ],
            'destinations' => [
                ['city' => 'Yogyakarta', 'price' => 'Rp 800rb', 'tag' => 'Budaya'],
                ['city' => 'Labuan Bajo', 'price' => 'Rp 2.1jt', 'tag' => 'Alam'],
                ['city' => 'Bandung', 'price' => 'Rp 150rb', 'tag' => 'Kota'],
            ]
        ];

        // Memanggil view 'home' dan mengirim data
        return view('home', $data);
    }
}