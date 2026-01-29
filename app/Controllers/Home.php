<?php

namespace App\Controllers;

use App\Models\TourModel;
use App\Models\DestinationModel;

class Home extends BaseController
{
    public function index()
    {
        // 1. Panggil Model
        $tourModel = new TourModel();
        $destinationModel = new DestinationModel();

        // 2. Ambil data dari Database
        $data = [
            // Data untuk Web (Tours)
            'tours' => $tourModel->findAll(),
            
            // Data untuk Mobile (Destinasi)
            'destinations' => $destinationModel->findAll()
        ];

        // 3. Tampilkan View 'home' dengan membawa data
        return view('home', $data);
    }

    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        $tourModel = new TourModel();
        $destinationModel = new DestinationModel();
        
        // Logika Pencarian
        $data = [
            'tours' => $tourModel->like('name', $keyword)->findAll(),
            'destinations' => $destinationModel->findAll() // Tetap load ini agar tampilan mobile tidak error
        ];
        
        return view('home', $data);
    }

    public function detail($id)
    {
        $tourModel = new TourModel();
        
        // Ambil 1 data berdasarkan ID
        $tour = $tourModel->find($id);

        // Jika data tidak ditemukan (misal ID 9999), tampilkan error 404
        if (empty($tour)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tur tidak ditemukan: ' . $id);
        }

        $data = [
            'tour' => $tour
        ];

        return view('detail', $data);
    }
}