<?php

namespace App\Controllers;

use App\Models\SuratModel;

class Home extends BaseController
{
    protected $sm;
    public function __construct()
    {
        $this->sm = new SuratModel();
    }

    public function index()
    {
        $data['user'] = user();
        $data['title'] = 'AMSM - Warga';
        $data['profil_lengkap'] = $this->sm->cekProfil(user_id());
        $data['surat'] = $this->sm->getSuratByID(user_id());
        $data['surats'] = $this->sm->getSurats();

        return view('index', $data);
    }
}
