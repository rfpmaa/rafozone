<?php

namespace App\Controllers;

use App\Models\MakananModel;

class Makanan extends BaseController
{
    public function index()
{
    $data = [
        'title' => 'Menu Makanan & Minuman | RafOzone',
        // Data ini yang akan tampil di web tanpa perlu DB
        'menu'  => [
            [
                'nama_menu' => 'Indomie Goreng + Telur',
                'harga'     => 10000,
                'stok'      => 50,
                'gambar_url' => 'https://awsimages.detik.net.id/community/media/visual/2022/10/24/duplikat-indomie-goreng_43.jpeg?w=700&q=90'
            ],
            [
                'nama_menu' => 'Nasi Goreng Spesial',
                'harga'     => 15000,
                'stok'      => 20,
                'gambar_url' => 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/07/13073811/Praktis-dengan-Bahan-Sederhana-Ini-Resep-Nasi-Goreng-Special-1.jpg'
            ],
            [
                'nama_menu' => 'Kentang Goreng',
                'harga'     => 8000,
                'stok'      => 30,
                'gambar_url' => 'https://cdn0-production-images-kly.akamaized.net/8lzd6jXDeS5ssUBq90wQZUw_MVg=/1280x720/smart/filters:quality(75):strip_icc()/kly-media-production/medias/970871/original/021248500_1440846143-header_chiantilvpa_com.jpg'
            ],
            [
                'nama_menu' => 'Es Teh Manis',
                'harga'     => 5000,
                'stok'      => 100,
                'gambar_url' => 'https://asset.kompas.com/crops/toOljW__-UqEVhGAJe8UyPdZWnU=/92x67:892x600/750x500/data/photo/2023/08/23/64e59deb79bfb.jpg'
            ],
            [
                'nama_menu' => 'Kopi Hitam',
                'harga'     => 5000,
                'stok'      => 40,
                'gambar_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRS3WMBEw_ZYf-PsJT2oBL1oONTvqW8QbIjoA&s'
            ],
            [
                'nama_menu' => 'Coca Cola',
                'harga'     => 7000,
                'stok'      => 25,
                'gambar_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2tx89BLId8zy3rbdWtlnZvyhsebpAbS6KGw&s'
            ],
            [
                'nama_menu' => 'Kopi Susu',
                'harga'     => 5000,
                'stok'      => 5,
                'gambar_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeNhjM9t5_uyN76BElUJJ2zRFnRbZDoaRVmg&s'
            ],
        ]
    ];

    return view('customer/menu_makanan', $data);
}
}