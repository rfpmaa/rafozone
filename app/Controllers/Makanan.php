<?php

namespace App\Controllers;

use App\Models\MakananModel;

class Makanan extends BaseController
{
    public function index()
    {
        $makananModel = new MakananModel();
        
        $data = [
            'title' => 'Menu Makanan & Minuman | RafOzone',
            'menu'  => $makananModel->findAll() // Mengambil semua data dari tabel menu_makanan
        ];

        return view('customer/menu_makanan', $data);
    }
}