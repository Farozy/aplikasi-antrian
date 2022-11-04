<?php

namespace App\Models;

use CodeIgniter\Model;

class KodeAntrianModel extends Model
{
    protected $table            = 'kode_antrian';
    protected $primaryKey       = 'id_kode_antrian';
    protected $allowedFields    = ['kode_antrian'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
