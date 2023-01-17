<?php

namespace App\Controllers\Petugas;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Controllers\BaseController;
use App\Models\SuratModel;

class Petugas extends BaseController
{
    protected $sm;

    public function __construct()
    {
        $this->sm = new SuratModel();
    }

    public function index()
    {
        $data['user'] = user();
        $data['title'] = 'AMSM - Petugas';
        return view('user/petugas/index');
    }

    public function manajemen_surat()
    {
        $data['user'] = user();
        $data['title'] = 'AMSM - Petugas';
        $data['surat'] = $this->sm->getSurats();
        return view('user/petugas/manajemen_surat', $data);
    }

    //get id pemohon
    public function get_id_pemohon()
    {
        $id_user = $this->request->getVar('id_user');
        $data = $this->sm->getPemohon($id_user);
        echo json_encode($data);
    }

    public function update_surat()
    {
        $data['title'] = 'AMSM - Petugas';
        $data['user'] = user();
        $data = [
            'tanggal_surat' => date("Y-m-d H:i:s"),
            'pemohon' => $this->request->getVar('pemohon'),
            'perihal' => $this->request->getVar('perihal'),
            'keperluan' => $this->request->getVar('keperluan'),
            'keterangan' => $this->request->getVar('keterangan'),
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

        return view('user/petugas/manajemen_surat', $data);
    }

    public function update_stts_surat()
    {
        $id_surat = $this->request->getVar('id_surat');
        $data = [
            'status' => 'selesai',
        ];
        if ($this->sm->updateSurat($id_surat, $data)) {
            session()->setFlashdata('Berhasil', 'Surat berhasil diselesaikan');
            return redirect()->to(base_url('/manajemen-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Surat gagal diselesaikan');
            return redirect()->to(base_url('/manajemen-surat'));
        }
    }

    public function cetak_surat($id_surat)
    {
        $id_pemohon = $this->sm->getSurats()[0]->id_user;
        $data['datas'] = $this->sm->getUserBySurat();


        $data['title'] = 'AMSM - Petugas';
        $data['surat'] = $this->sm->getSuratByIDSurat($id_surat);
        $data['surat'] = $data['surat'][0];
        $data['tanggal'] = $this->getTanggalIndo();
        return view('surat', $data);
    }

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
        $data['title'] = 'AMSM - Warga';
        $data['user'] = user();

        if ($this->sm->deleteSurat($id_surat)) {
            session()->setFlashdata('Berhasil', 'Surat berhasil dihapus');
            return redirect()->to(base_url('/pengajuan-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Surat gagal dihapus');
            return redirect()->to(base_url('/pengajuan-surat'));
        }

        return view('pengajuan_surat', $data);
    }

    //profil petugas
    public function profil_petugas()
    {
        $data['user'] = user();
        $data['title'] = 'AMSM - Petugas';
        return view('user/petugas/profil_petugas', $data);
    }

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
