<?php

namespace App\Controllers;

use App\Models\LayananModel;

class Layanan extends BaseController
{
    public function index()
    {
        $layananModel = new LayananModel();
        
        $data = [
            'title'   => 'Daftar Layanan PS',
            'layanan' => $layananModel->findAll() // Mengambil semua data dari tabel layanan
        ];

        return view('customer/layanan', $data);
    }
}