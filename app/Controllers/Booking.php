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
    $jenis_ps   = $this->request->getPost('jenis_ps');
    $harga_ps   = $this->request->getPost('harga_per_jam'); 
    $durasi     = $this->request->getPost('durasi');
    $waktu      = $this->request->getPost('waktu_mulai');
    $harga_mkn  = $this->request->getPost('harga_makanan'); 

    // Hitung total dengan benar
    $total = ((int)$harga_ps * (int)$durasi) + (int)$harga_mkn;

    $data = [
        'title'       => 'Invoice Pembayaran',
        'invoice_no'  => 'INV-' . date('Ymd') . rand(100, 999),
        'jenis_ps'    => $jenis_ps,
        'durasi'      => $durasi,
        'total'       => $total,
        'waktu_mulai' => $waktu,
        'makanan'     => ($harga_mkn > 0) ? "Cemilan Tambahan" : "Tanpa Cemilan"
    ];

    return view('customer/invoice', $data);
}
}