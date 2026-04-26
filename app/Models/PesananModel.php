<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    // Nama tabel di database kamu
    protected $table      = 'pesanan'; 
    // Nama primary key tabel tersebut
    protected $primaryKey = 'id';

    // Kolom mana saja yang boleh diisi/diubah melalui script
    protected $allowedFields = ['invoice', 'customer', 'layanan', 'tanggal', 'durasi', 'total', 'status'];

    // Aktifkan ini jika kamu menggunakan kolom created_at & updated_at
    protected $useTimestamps = false;
}