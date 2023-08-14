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
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }

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
        // if (logged_in()) {
        //     foreach (user()->getRoles() as $role) {
        //         if (!in_array($role, ['admin', 'petugas'])) {
        //             if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
        //                 return redirect()->to(base_url('/error?code=403'));
        //             }
        //         }
        //     }
        // }

        return view('lp');
    }

    public function profil_desa()
    {
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }
        
        $data['user'] = user();
        $data['title'] = 'ASMS - Profil Desa';
        return view('profil_desa', $data);
    }

    function error() {
        return view('error');
    }
}
