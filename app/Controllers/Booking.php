<?php

namespace App\Controllers;

use App\Models\LayananModel;

class Booking extends BaseController
{
// Cari fungsi yang menampilkan form booking (biasanya bernama pesan atau booking)
public function pesan($id_layanan)
{
    // --- TAMBAHKAN KODE INI ---
    if (session()->get('role') == 'admin') {
        return redirect()->to('/admin/dashboard')->with('error', 'Admin dilarang booking sendiri!');
    }
    // --------------------------

    $layananModel = new \App\Models\LayananModel();
    $makananModel = new \App\Models\MakananModel();

    $data = [
        'layanan' => $layananModel->find($id_layanan),
        'makanan' => $makananModel->findAll(),
        'title'   => 'Konfirmasi Pemesanan'
    ];

    return view('customer/form_booking', $data);
}

public function promo($id = null)
{
    $layananModel = new \App\Models\LayananModel();
    $makananModel = new \App\Models\MakananModel();

    $layanan = $layananModel->find($id);
    if (!$layanan) {
        return redirect()->back()->with('error', 'Layanan tidak ditemukan.');
    }

    $data = [
        'title'   => 'Konfirmasi Booking Promo',
        'layanan' => $layanan,
        'makanan' => $makananModel->findAll()
    ];

    // Kita arahkan ke file view baru khusus form promo
    return view('customer/booking_promo', $data);
}

public function simpan_promo()
{
    $pesananModel = new \App\Models\PesananModel();

    // 1. Ambil data input form
    $id_layanan    = $this->request->getPost('id_layanan');
    $jenis_ps      = $this->request->getPost('jenis_ps');
    $harga_per_jam = (int)$this->request->getPost('harga_per_jam');
    $waktu_mulai   = $this->request->getPost('waktu_mulai');
    $durasi        = (int)$this->request->getPost('durasi');
    $makanan_input = $this->request->getPost('makanan');

    // 2. Hitung harga PS dasar
    $total_ps = $harga_per_jam * $durasi;

    // LOGIC UTAMA PROMO: Jika durasi minimal 5 jam, potong diskon 10%
    if ($durasi >= 5) {
        $diskon   = $total_ps * 0.10;
        $total_ps = $total_ps - $diskon;
    }

    // 3. Hitung makanan jika ada
    $nama_makanan = '-';
    $harga_makanan = 0;
    if (!empty($makanan_input)) {
        $pecah = explode('|', $makanan_input);
        $nama_makanan  = $pecah[0];
        $harga_makanan = (int)$pecah[1];
    }

    $total_akhir = $total_ps + $harga_makanan;
    $invoice_no  = 'INV-' . strtoupper(uniqid());

    // 4. Susun data database (Sesuaikan dengan field tabel pesananmu)
    $dataDatabase = [
        'invoice_no'    => $invoice_no,
        'id_layanan'    => $id_layanan,
        'jenis_ps'      => $jenis_ps,
        'durasi'        => $durasi,
        'waktu_mulai'   => $waktu_mulai,
        'nama_makanan'  => $nama_makanan,
        'total'         => $total_akhir,
        'status'        => 'pending'
    ];

    $pesananModel->insert($dataDatabase);

    // 5. Lempar ke halaman invoice bawaanmu
    $dataView = [
        'title'        => 'Invoice Pembayaran',
        'invoice_no'   => $invoice_no,
        'jenis_ps'     => $jenis_ps,
        'durasi'       => $durasi . ' Jam' . ($durasi >= 5 ? ' (Diskon Promo 10%)' : ''),
        'waktu_mulai'  => $waktu_mulai,
        'total'        => $total_akhir,
        'nama_makanan' => $nama_makanan
    ];

    return view('customer/invoice', $dataView);
}
public function simpan()
{
    // 1. Load Model Pesanan
    $pesananModel = new \App\Models\PesananModel();

    // 2. Tangkap data dari form
    $jenis_ps = $this->request->getPost('jenis_ps');
    $harga_ps = $this->request->getPost('harga_per_jam');
    $durasi   = $this->request->getPost('durasi');
    $waktu    = $this->request->getPost('waktu_mulai');
    $makanan  = $this->request->getPost('makanan');

    $nama_makanan = 'Tidak Ada';
    $harga_mkn = 0;

    if (!empty($makanan)) {
        $pecah = explode('|', $makanan);
        $nama_makanan = $pecah[0];
        $harga_mkn = $pecah[1];
    }

    // 3. Hitung total
    $total = ((int)$harga_ps * (int)$durasi) + (int)$harga_mkn;
    $invoice_no = 'INV-' . date('Ymd') . rand(100,999);

    // 4. PERSYARATAN UTAMA: Simpan ke Database
    // Sesuaikan key array dengan allowedFields di PesananModel kamu
    $dataDatabase = [
        'invoice'  => $invoice_no,
        'customer' => session()->get('nama') ?? 'Guest', // Ambil nama dari session login
        'layanan'  => $jenis_ps,
        'tanggal'  => date('Y-m-d'),
        'durasi'   => $durasi,
        'total'    => $total,
        'status'   => 'Pending'
    ];

    // Perintah sakti untuk memasukkan data ke tabel 'pesanan'
    $pesananModel->insert($dataDatabase);

    // 5. Kirim data ke View Invoice (seperti semula)
    $dataView = [
        'title'        => 'Invoice Pembayaran',
        'invoice_no'   => $invoice_no,
        'jenis_ps'     => $jenis_ps,
        'durasi'       => $durasi,
        'waktu_mulai'  => $waktu,
        'total'        => $total,
        'nama_makanan' => $nama_makanan
    ];

    return view('customer/invoice', $dataView);
}


}