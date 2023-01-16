<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['user'] = user();
        $data['title'] = 'AMSM - Warga';
        return view('index', $data);
    }

    public function surat()
    {
        return view('cetak_surat');
    }
}
