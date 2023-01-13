<?php

namespace App\Controllers;

use PhpParser\Node\Expr\Cast\Object_;
use stdClass;

class Admin extends BaseController
{
    public function index()
    {
        $data['user'] = user();
        $data['title'] = 'AMSM - Warga';
        return view('user/admin/index', $data);
    }

    public function buat_surat()
    {
        $data['user'] = user();
        $data['title'] = 'AMSM - Warga';
        return view('user/admin/buat_surat', $data);
    }

    public function manajemen_user()
    {
        $data['surat'] = array(
            array(
                'kop' => '12023/12/12/2019',
                'nama' => 'Surat Pengajuan Izin Usaha',
                'keterangan' => 'Diajukan oleh Putri untuk usaha produksi jeans',
                'tanggal' => '12/12/2019'
            ),
            array(
                'kop' => '12024/3/1/2020',
                'nama' => 'Surat Pengajuan SKTM',
                'keterangan' => 'Diajukan oleh Jono untuk mendaftar beasiswa',
                'tanggal' => '3/1/2020'
            ),
            array(
                'kop' => '12025/4/1/2020',
                'nama' => 'Surat Pengajuan SKTM',
                'keterangan' => 'Diajukan oleh Budi untuk mendaftar sekolah',
                'tanggal' => '4/1/2020'
            ),
        );
        $data['user'] = user();
        $data['title'] = 'AMSM - Warga';
        return view('user/admin/manajemen_user', $data);
    }
}
