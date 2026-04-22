<?php

namespace App\Controllers;

use App\Models\LayananModel;
use App\Models\MakananModel;
// Misalkan kamu sudah punya BookingModel untuk simpan data pesanan
// use App\Models\BookingModel; 

class Admin extends BaseController
{
    public function dashboard()
    {
        // Proteksi: Kalau bukan admin, tendang balik ke login
        if (session()->get('role') != 'admin') {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Dashboard Admin | RafOzone',
            'nama'  => session()->get('nama')
        ];

        return view('admin/dashboard', $data);
    }
    // Tambahkan di dalam class Admin
public function layanan()
{
    $model = new \App\Models\LayananModel();
    $data = [
        'title'   => 'Kelola Layanan | RafOzone',
        'layanan' => $model->findAll()
    ];
    return view('admin/layanan', $data);
}

public function tambah_layanan()
{
    $model = new \App\Models\LayananModel();
    $model->save([
        'jenis_ps'      => $this->request->getVar('jenis_ps'),
        'tipe_room'     => $this->request->getVar('tipe_room'),
        'harga_per_jam' => $this->request->getVar('harga_per_jam'),
        'status'        => 'tersedia'
    ]);
    return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil ditambah!');
}

public function hapus_layanan($id)
{
    $model = new \App\Models\LayananModel();
    $model->delete($id);
    return redirect()->to('/admin/layanan')->with('success', 'Layanan berhasil dihapus!');
}

public function makanan()
{
    $model = new \App\Models\MakananModel();
    $data = [
        'title'   => 'Kelola Menu Makanan | RafOzone',
        'makanan' => $model->findAll()
    ];
    return view('admin/makanan', $data);
}

public function tambah_makanan()
{
    $model = new \App\Models\MakananModel();
    $model->save([
        'nama_menu' => $this->request->getVar('nama_menu'),
        'harga'     => $this->request->getVar('harga'),
    ]);
    return redirect()->to('/admin/makanan')->with('success', 'Menu berhasil ditambah!');
}

public function hapus_makanan($id)
{
    $model = new \App\Models\MakananModel();
    $model->delete($id);
    return redirect()->to('/admin/makanan')->with('success', 'Menu berhasil dihapus!');
}}
