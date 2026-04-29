<?php

namespace App\Models; //nama folder

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table      = 'layanan'; //nama tabel
    protected $primaryKey = 'id_layanan'; 
    protected $allowedFields = ['jenis_ps', 'tipe_room', 'harga_per_jam', 'status_room']; //kolom
}