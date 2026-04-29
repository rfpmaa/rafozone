<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table      = 'pesanan'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['invoice', 'customer', 'layanan', 'tanggal', 'durasi', 'total', 'status'];
    protected $useTimestamps = false;
    
    // TAMBAHKAN FUNGSI INI
    public function getSemuaPesanan()
    {
        return $this->findAll(); // Mengambil semua baris dari tabel 'pesanan'
    }
}