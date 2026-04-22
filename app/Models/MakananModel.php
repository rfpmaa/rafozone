<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model
{
    protected $table      = 'menu_makanan';
    protected $primaryKey = 'id_menu';
    protected $allowedFields = ['nama_menu', 'harga', 'stok'];
}
    