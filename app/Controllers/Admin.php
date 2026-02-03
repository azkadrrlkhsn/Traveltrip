<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\TourModel;

class Admin extends BaseController
{
    // =================================================================
    // 1. DASHBOARD ADMIN
    // =================================================================
    public function index()
    {
        // Cek Login
        if (!session()->get('is_admin_logged_in')) {
            return redirect()->to('login');
        }

        $bookingModel = new BookingModel();
        $tourModel = new TourModel();

        // STATISTIK DASHBOARD
        $incomeData = $bookingModel->selectSum('total_price')->where('status', 'confirmed')->first();
        $totalIncome = $incomeData['total_price'] ?? 0;

        $totalBookings = $bookingModel->countAll();
        $pendingBookings = $bookingModel->where('status', 'pending')->countAllResults();
        $totalTours = $tourModel->countAll();

        $data = [
            'total_income' => $totalIncome,
            'total_bookings' => $totalBookings,
            'pending_bookings' => $pendingBookings,
            'total_tours' => $totalTours
        ];

        return view('admin/dashboard', $data);
    }

    // =================================================================
    // 2. KELOLA PESANAN (BOOKINGS) -> INI YANG DIPERBAIKI
    // =================================================================
    public function bookings()
    {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');

        $bookingModel = new BookingModel();
        
        // PERBAIKAN: Hapus baris ->join('users', ...) karena kolom user_id tidak ada
        // Kita cukup ambil data dari tabel bookings dan join ke tours saja
        $data['bookings'] = $bookingModel->select('bookings.*, tours.name as tour_name')
                                         ->join('tours', 'tours.id = bookings.tour_id', 'left')
                                         ->orderBy('bookings.id', 'DESC')
                                         ->findAll();

        return view('admin/bookings', $data);
    }
    
    // Konfirmasi Pesanan
    public function confirm($id) {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');
        
        $bookingModel = new BookingModel();
        $bookingModel->update($id, ['status' => 'confirmed']);
        
        return redirect()->to('admin/bookings')->with('message', 'Pesanan Dikonfirmasi');
    }

    // Tolak Pesanan
    public function reject($id) {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');
        
        $bookingModel = new BookingModel();
        $bookingModel->update($id, ['status' => 'cancelled']);
        
        return redirect()->to('admin/bookings')->with('message', 'Pesanan Ditolak');
    }

    // Hapus Pesanan Permanen
    public function delete_booking($id)
    {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');
        
        $bookingModel = new BookingModel();
        $booking = $bookingModel->find($id);

        // Hapus file gambar jika ada
        if($booking && !empty($booking['proof_image']) && file_exists('uploads/payments/'.$booking['proof_image'])){
            unlink('uploads/payments/'.$booking['proof_image']);
        }

        $bookingModel->delete($id);
        return redirect()->to('admin/bookings')->with('message', 'Data pesanan dihapus permanen.');
    }

    // =================================================================
    // 3. KELOLA WISATA (TOURS)
    // =================================================================
    public function tours()
    {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');

        $tourModel = new TourModel();
        $data['tours'] = $tourModel->orderBy('id', 'DESC')->findAll();

        return view('admin/tours/index', $data);
    }

    public function create_tour()
    {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');
        return view('admin/tours/create');
    }

    public function store_tour()
    {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');

        $tourModel = new TourModel();
        
        $file = $this->request->getFile('image');
        $imageUrl = 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=2021'; // Default

        if($file && $file->isValid() && !$file->hasMoved()){
            $fileName = $file->getRandomName();
            $file->move('uploads/tours', $fileName);
            $imageUrl = 'uploads/tours/' . $fileName;
        }

        $tourModel->save([
            'name'           => $this->request->getPost('name'),
            'description'    => $this->request->getPost('description'),
            'location'       => $this->request->getPost('location'),
            'duration'       => $this->request->getPost('duration'),
            'price'          => $this->request->getPost('price'),
            'discount_price' => $this->request->getPost('discount_price'),
            'image_url'      => $imageUrl 
        ]);

        return redirect()->to('admin/tours')->with('message', 'Paket wisata berhasil ditambahkan.');
    }

    public function edit_tour($id)
    {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');
        
        $tourModel = new TourModel();
        $data['tour'] = $tourModel->find($id);
        
        return view('admin/tours/edit', $data);
    }

    public function update_tour($id)
    {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');

        $tourModel = new TourModel();
        
        $data = [
            'name'           => $this->request->getPost('name'),
            'description'    => $this->request->getPost('description'),
            'location'       => $this->request->getPost('location'),
            'duration'       => $this->request->getPost('duration'),
            'price'          => $this->request->getPost('price'),
            'discount_price' => $this->request->getPost('discount_price'),
        ];

        $file = $this->request->getFile('image');
        if($file && $file->isValid() && !$file->hasMoved()){
            $fileName = $file->getRandomName();
            $file->move('uploads/tours', $fileName);
            $data['image_url'] = 'uploads/tours/' . $fileName;
        }

        $tourModel->update($id, $data);
        return redirect()->to('admin/tours')->with('message', 'Data berhasil diupdate.');
    }

    public function delete_tour($id)
    {
        if (!session()->get('is_admin_logged_in')) return redirect()->to('login');
        
        $tourModel = new TourModel();
        $tourModel->delete($id);
        
        return redirect()->to('admin/tours')->with('message', 'Paket wisata dihapus.');
    }
}