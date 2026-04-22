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
        $id_layanan = $this->request->getPost('id_layanan');
        $harga      = $this->request->getPost('harga_per_jam'); 
        $durasi     = $this->request->getPost('durasi');
        $jenis_ps   = $this->request->getPost('jenis_ps');
        $waktu      = $this->request->getPost('waktu_mulai');
        $makanan    = $this->request->getPost('makanan'); // Ambil harga makanan dari select

        // 2. Hitung total (Taruh rumusnya di sini!)
        $total = ((int)$harga * (int)$durasi) + (int)$makanan;

        // 3. Kirim data ke Invoice
        $data = [
            'title'       => 'Invoice Pembayaran',
            'invoice_no'  => 'INV-' . date('Ymd') . rand(100, 999),
            'jenis_ps'    => $jenis_ps,
            'durasi'      => $durasi,
            'total'       => $total,
            'waktu_mulai' => $waktu
        ];

        return view('customer/invoice', $data);
    }
}