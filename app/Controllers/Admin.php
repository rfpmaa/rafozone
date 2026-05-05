<?php

namespace App\Controllers;

use App\Models\LayananModel;
use App\Models\MakananModel;
use App\Models\PesananModel;

class Admin extends BaseController
{
    protected $pesananModel;

    public function __construct()
    {
        // Panggil model di constructor agar bisa dipakai di semua fungsi
        $this->pesananModel = new PesananModel();
    }

public function dashboard()
{
    // Proteksi admin
    if (session()->get('role') != 'admin') {
        return redirect()->to('/login');
    }

    // HITUNG DATA REAL-TIME UNTUK DASHBOARD
    $totalBooking = $this->pesananModel->countAllResults(false);
    $pendapatan   = $this->pesananModel->selectSum('total')
                                       ->where('status', 'Selesai')
                                       ->get()->getRow()->total;

    $data = [
        'title'            => 'Dashboard Admin | RafOzone',
        'nama'             => session()->get('nama'),
        'total_booking'    => $totalBooking,      // Tambahkan ini
        'total_pendapatan' => $pendapatan ?? 0,    // Tambahkan ini
        'pesanan'          => $this->pesananModel->orderBy('id', 'DESC')->findAll(2) // Ambil 2 data terakhir saja untuk pajangan
    ];

    return view('admin/dashboard', $data);
}

    public function pesanan()
    {
        $keyword = $this->request->getGet('keyword');
        $status  = $this->request->getGet('status');

        // --- HITUNG OTOMATIS UNTUK BOX ---
        $totalBooking = $this->pesananModel->countAllResults(false);
        $pendapatan   = $this->pesananModel->selectSum('total')
                                           ->where('status', 'Selesai')
                                           ->get()->getRow()->total;

        // --- LOGIKA TABEL ---
        $builder = $this->pesananModel;
        if ($keyword) {
            $builder->like('customer', $keyword);
        }
        if ($status) {
            $builder->where('status', $status);
        }

        $data = [
            'title'            => 'Data Pesanan',
            'nama'             => 'Admin Rafozone',
            'pesanan'          => $builder->findAll(),
            'total_booking'    => $totalBooking,
            'total_pendapatan' => $pendapatan ?? 0
        ];

        return view('admin/pesanan', $data);
    }

    public function konfirmasi($id)
    {
        $this->pesananModel->update($id, ['status' => 'Selesai']);
        return redirect()->to('/admin/pesanan')->with('success', 'Pesanan berhasil dikonfirmasi!');
    }

    public function layanan()
    {
        $model = new LayananModel();
        $data = [
            'title'   => 'Kelola Layanan | RafOzone',
            'layanan' => $model->findAll()
        ];
        return view('admin/layanan', $data);
    }

    public function makanan()
    {
        $model = new MakananModel();
        $data = [
            'title'   => 'Kelola Menu Makanan | RafOzone',
            'makanan' => $model->findAll()
        ];
        return view('admin/makanan', $data);
    }
    
    // Tambahkan fungsi tambah/hapus layanan & makanan di bawah sini jika diperlukan
}