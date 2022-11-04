<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to('PemanggilanAntrian');
        // $data = ['title' => 'Home'];
        // return view('templates/main', $data);
        // return view('welcome_message');
    }
}
