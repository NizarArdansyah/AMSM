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
            $data['title'] = 'ASMS - Warga';
        } elseif (in_groups('petugas')) {
            $data['title'] = 'ASMS - Petugas';
        } elseif (in_groups('admin')) {
            $data['title'] = 'ASMS - Admin';
        }
        $data['profil_lengkap'] = $this->sm->cekProfil(user_id());
        $data['surat'] = $this->sm->getSuratByID(user_id());
        $data['surats'] = $this->sm->getSurats();

        return view('index', $data);
    }

    public function lp()
    {
        return view('lp');
    }

    public function profil_desa()
    {
        $data['user'] = user();
        $data['title'] = 'ASMS - Profil Desa';
        return view('profil_desa', $data);
    }
}
