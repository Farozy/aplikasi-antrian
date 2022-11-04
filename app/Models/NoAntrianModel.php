<?php

namespace App\Models;

use CodeIgniter\Model;

class NoAntrianModel extends Model
{
    protected $table            = 'no_antrian';
    protected $primaryKey       = 'id_no_antrian';
    protected $allowedFields    = ['no_antrian'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
