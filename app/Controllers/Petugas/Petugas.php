<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\SuratModel;
use App\Models\UserModel;

class Petugas extends BaseController
{
    protected $sm;
    protected $master;

    public function __construct()
    {
        $this->sm = new SuratModel();
        $this->master = new \App\Models\MasterSuratModel();
    }

    function master_surat() {
        if (in_groups('user')) {
            $data['title'] = 'AMSM - Warga';
        } elseif (in_groups('petugas')) {
            $data['title'] = 'AMSM - Petugas';
        } elseif (in_groups('admin')) {
            $data['title'] = 'AMSM - Admin';
        }

        $data['master'] = $this->master->findAll();

        return view('user/petugas/master_surat', $data);
    }

    function simpan_master() {
        $data = [
            'jenis_surat' => $this->request->getVar('jenis_surat'),
        ];

        if ($this->master->save($data)) {
            session()->setFlashdata('Berhasil', 'Master surat berhasil ditambahkan');
            return redirect()->to(base_url('/master-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Master surat gagal ditambahkan');
            return redirect()->to(base_url('/master-surat'));
        }
    }

    function hapus_master($id) {
        if ($this->master->delete($id)) {
            session()->setFlashdata('Berhasil', 'Master surat berhasil dihapus');
            return redirect()->to(base_url('/master-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Master surat gagal dihapus');
            return redirect()->to(base_url('/master-surat'));
        }
    }

    // mengarahkan ke manajemen surat
    public function manajemen_surat()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('nik', 'ASC')->findAll();

        $data['user'] = user();
        if (in_groups('user')) {
            $data['title'] = 'AMSM - Warga';
        } elseif (in_groups('petugas')) {
            $data['title'] = 'AMSM - Petugas';
        } elseif (in_groups('admin')) {
            $data['title'] = 'AMSM - Admin';
        }
        $data['surat'] = $this->sm->getSurats();
        $data['muser'] = $this->sm;
        $data['master'] = $this->master->findAll();

        return view('user/petugas/manajemen_surat', $data);
    }

    // update surat
    public function update_surat()
    {
        $data['title'] = 'AMSM - Petugas';
        $data['user'] = user();
        $data = [
            'tanggal_surat' => date("Y-m-d H:i:s"),
            'pemohon' => $this->request->getVar('pemohon'),
            // 'perihal' => $this->request->getVar('perihal'),
            'keperluan' => $this->request->getVar('keperluan'),
            'status' => $this->request->getVar('status'),
            'jenis' => $this->request->getVar('jenis'),
        ];

        $id_surat = $this->request->getVar('id_surat');

        if ($this->sm->updateSurat($id_surat, $data)) {
            session()->setFlashdata('Berhasil', 'Surat berhasil diupdate');
            return redirect()->to(base_url('/manajemen-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Surat gagal diupdate, pastikan masukan setiap kolom sesuai');
            return redirect()->to(base_url('/manajemen-surat'));
        }

        return redirect()->to(base_url('/manajemen-surat'));
        // return view('user/petugas/manajemen_surat', $data);
    }

    // cetak surat
    public function cetak_surat($id_surat)
    {

        $data['title'] = 'AMSM - Petugas';
        $data['tanggal'] = $this->getTanggalIndo();

        //data surat
        $data['surat'] = $this->sm->getSuratByIDSurat($id_surat);
        $data['surat'] = $data['surat'][0];

        //data pemohon
        $id_pemohon = $data['surat']->id_user;
        $data['data_pemohon'] = $this->sm->getUserBySurat($id_pemohon);


        return view('surat', $data);
    }

    // mengirim pesan pembatalan ke pemohon
    public function pesan_pembatalan()
    {
        $id_surat = $this->request->getVar('id_surat');
        $data = [
            'pesan' => $this->request->getVar('pesan'),
        ];
        if ($this->sm->updateSurat($id_surat, $data)) {
            session()->setFlashdata('Berhasil', 'Pesan berhasil dikirim');
            return redirect()->to(base_url('/manajemen-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Pesan gagal dikirim');
            return redirect()->to(base_url('/manajemen-surat'));
        }
    }

    public function hapus_surat($id_surat)
    {
        $data['title'] = 'AMSM - Petugas';
        $data['user'] = user();

        if ($this->sm->deleteSurat($id_surat)) {
            session()->setFlashdata('Berhasil', 'Surat berhasil dihapus');
            return redirect()->to(base_url('/manajemen-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Surat gagal dihapus');
            return redirect()->to(base_url('/manajemen-surat'));
        }
        
        return redirect()->to(base_url('/manajemen-surat'));
        // return view('user/petugas/manajemen_surat', $data);
    }

    //mengarahkan ke profil petugas
    public function profil_petugas()
    {
        $data['user'] = user();
        $data['title'] = 'AMSM - Petugas';
        return view('user/petugas/profil_petugas', $data);
    }

    //mengambil waktu dg format indonesia
    public function getTanggalIndo()
    {
        $hari = date("l");
        $tanggal = date("d");
        $bulan = date("F");
        $tahun = date("Y");

        $hariIndo = "";
        $bulanIndo = "";

        switch ($hari) {
            case 'Sunday':
                $hariIndo = "Minggu";
                break;
            case 'Monday':
                $hariIndo = "Senin";
                break;
            case 'Tuesday':
                $hariIndo = "Selasa";
                break;
            case 'Wednesday':
                $hariIndo = "Rabu";
                break;
            case 'Thursday':
                $hariIndo = "Kamis";
                break;
            case 'Friday':
                $hariIndo = "Jumat";
                break;
            case 'Saturday':
                $hariIndo = "Sabtu";
                break;
            default:
                $hariIndo = "Tidak di ketahui";
                break;
        }

        switch ($bulan) {
            case 'January':
                $bulanIndo = "Januari";
                break;
            case 'February':
                $bulanIndo = "Februari";
                break;
            case 'March':
                $bulanIndo = "Maret";
                break;
            case 'April':
                $bulanIndo = "April";
                break;
            case 'May':
                $bulanIndo = "Mei";
                break;
            case 'June':
                $bulanIndo = "Juni";
                break;
            case 'July':
                $bulanIndo = "Juli";
                break;
            case 'August':
                $bulanIndo = "Agustus";
                break;
            case 'September':
                $bulanIndo = "September";
                break;
            case 'October':
                $bulanIndo = "Oktober";
                break;
            case 'November':
                $bulanIndo = "November";
                break;
            case 'December':
                $bulanIndo = "Desember";
                break;
            default:
                $bulanIndo = "Tidak di ketahui";
                break;
        }

        $tanggalIndo = $hariIndo . ", " . $tanggal . " " . $bulanIndo . " " . $tahun;
        return $tanggalIndo;
    }
}
