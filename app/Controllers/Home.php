<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('index', $data);
    }

    public function promo()
{
    // Memanggil LayananModel untuk mengambil data tipe room dari database
    $layananModel = new \App\Models\LayananModel();
    
    $data = [
        'title'   => 'Promo Special RafOzone',
        'layanan' => $layananModel->findAll() // Mengambil data untuk disaring di view
    ];

    // Mengarahkan ke file view promo yang akan kita buat
    return view('customer/promo', $data); 
}
}