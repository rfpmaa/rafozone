<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table      = 'layanan';
    protected $primaryKey = 'id_layanan';
    protected $allowedFields = ['jenis_ps', 'tipe_room', 'harga_per_jam', 'status_room'];
}