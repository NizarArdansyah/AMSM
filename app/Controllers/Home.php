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
        if (in_groups('user')) {
            $data['title'] = 'AMSM - Warga';
        } elseif (in_groups('petugas')) {
            $data['title'] = 'AMSM - Petugas';
        } elseif (in_groups('admin')) {
            $data['title'] = 'AMSM - Admin';
        }
        $data['profil_lengkap'] = $this->sm->cekProfil(user_id());
        $data['surat'] = $this->sm->getSuratByID(user_id());
        $data['surats'] = $this->sm->getSurats();

        return view('index', $data);
    }

    public function profil_desa()
    {
        $data['user'] = user();
        $data['title'] = 'AMSM - Profil Desa';
        return view('profil_desa', $data);
    }
}
