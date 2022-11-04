<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NoAntrianModel;
use App\Models\KodeAntrianModel;

class PemanggilanAntrian extends BaseController
{
    public function __construct()
    {
        $this->nomer = new NoAntrianModel();
        $this->kode = new KodeAntrianModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Pemanggilan Antrian'
        ];

        return view('pemanggilanAntrian/view', $data);
    }

    public function setting()
    {
        $data = [
            'title' => 'Pemanggilan Antrian',
            'sub_title' => 'Setting'
        ];

        return view('pemanggilanAntrian/setting', $data);
    }
}
