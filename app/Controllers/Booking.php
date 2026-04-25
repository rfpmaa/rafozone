<?php

namespace App\Controllers;

use App\Models\LayananModel;

class Booking extends BaseController
{
// Cari fungsi yang menampilkan form booking (biasanya bernama pesan atau booking)
public function pesan($id_layanan)
{
    $layananModel = new \App\Models\LayananModel();
    $makananModel = new \App\Models\MakananModel(); // Pastikan model ini sudah di-load

    $data = [
        'layanan' => $layananModel->find($id_layanan),
        'makanan' => $makananModel->findAll(), // AMBIL SEMUA DATA DI SINI
        'title'   => 'Konfirmasi Pemesanan'
    ];

    return view('customer/form_booking', $data);
}

public function simpan()
{
    $jenis_ps = $this->request->getPost('jenis_ps');
    $harga_ps = $this->request->getPost('harga_per_jam');
    $durasi   = $this->request->getPost('durasi');
    $waktu    = $this->request->getPost('waktu_mulai');

    // Ambil data makanan
    $makanan = $this->request->getPost('makanan');

    $nama_makanan = 'Tidak Ada';
    $harga_mkn = 0;

    if (!empty($makanan)) {
        $pecah = explode('|', $makanan);
        $nama_makanan = $pecah[0];
        $harga_mkn = $pecah[1];
    }

    // Hitung total
    $total = ((int)$harga_ps * (int)$durasi) + (int)$harga_mkn;

    $data = [
        'title'        => 'Invoice Pembayaran',
        'invoice_no'   => 'INV-' . date('Ymd') . rand(100,999),
        'jenis_ps'     => $jenis_ps,
        'durasi'       => $durasi,
        'waktu_mulai'  => $waktu,
        'total'        => $total,
        'nama_makanan' => $nama_makanan
    ];

    return view('customer/invoice', $data);
}


}