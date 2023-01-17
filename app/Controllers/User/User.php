<?php


namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\SuratModel;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;



class User extends BaseController
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
        return view('user/warga/index', $data);
    }

    public function profil()
    {
        $data['user'] = user();

        if (in_groups('user')) {
            $data['title'] = 'AMSM - Warga';
        } elseif (in_groups('petugas')) {
            $data['title'] = 'AMSM - Petugas';
        } elseif (in_groups('admin')) {
            $data['title'] = 'AMSM - Admin';
        }

        return view('profil', $data);
    }

    // update profil 
    public function ubah_profil()
    {
        $data['user'] = user();

        if (in_groups('user')) {
            $data['title'] = 'AMSM - Warga';
        } elseif (in_groups('petugas')) {
            $data['title'] = 'AMSM - Petugas';
        } elseif (in_groups('admin')) {
            $data['title'] = 'AMSM - Admin';
        }
        $data = [
            'fullname' => $this->request->getVar('fullname'),
            'nik' => $this->request->getVar('nik'),
            'ttl' => $this->request->getVar('ttl'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'agama' => $this->request->getVar('agama'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
        ];

        $id_user = $this->request->getVar('id_user');

        if ($this->sm->updateProfil($id_user, $data)) {
            session()->setFlashdata('Berhasil', 'Profil berhasil diupdate');
            return redirect()->to(base_url('/profil'));
        } else {
            session()->setFlashdata('Gagal', 'Profil gagal diupdate, pastikan masukan setiap kolom sesuai');
            return redirect()->to(base_url('/profil'));
        }

        return view('profil', $data);
    }

    // mengarahkan ke pengajuan surat
    public function pengajuan_surat()
    {

        if (in_groups('user')) {
            $data['title'] = 'AMSM - Warga';
        } elseif (in_groups('petugas')) {
            $data['title'] = 'AMSM - Petugas';
        } elseif (in_groups('admin')) {
            $data['title'] = 'AMSM - Admin';
        }

        $data['user'] = user();
        $data['id_user'] = user_id();
        $data['surat'] = $this->sm->getSuratByID(user_id());
        return view('pengajuan_surat', $data);
    }


    // membuat pengajuan surat
    public function buat_pengajuan_surat()
    {
        if (in_groups('user')) {
            $data['title'] = 'AMSM - Warga';
        } elseif (in_groups('petugas')) {
            $data['title'] = 'AMSM - Petugas';
        } elseif (in_groups('admin')) {
            $data['title'] = 'AMSM - Admin';
        }
        $data['user'] = user();
        $data = [
            'id_user' => user_id(),
            'nomor_surat' => $this->sm->generate_nomor_surat(),
            'tanggal_surat' => date('Y-m-d H:i:s'),
            'pemohon' => $this->sm->getPemohon(user_id()),
            'perihal' => $this->request->getVar('perihal'),
            'keperluan' => $this->request->getVar('keperluan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'jenis' => $this->request->getVar('jenis'),
            'status' => 'antre',
        ];

        $profil_lengkap = $this->sm->cekProfil(user_id());

        if ($profil_lengkap) {
            if ($this->sm->insert($data)) {
                session()->setFlashdata('Berhasil', 'Surat berhasil diajukan');
                return redirect()->to(base_url('/pengajuan-surat'));
            } else {
                session()->setFlashdata('Gagal', 'Surat gagal diajukan, pastikan masukan setiap kolom sesuai');
                return redirect()->to(base_url('/pengajuan-surat'));
            }
        } else {
            session()->setFlashdata('Gagal', 'Surat gagal diajukan, pastikan profil lengkap');
            return redirect()->to(base_url('/pengajuan-surat'));
        }

        return view('pengajuan_surat', $data);
    }

    // update surat yang sudah diajukan
    public function update_pengajuan_surat()
    {

        if (in_groups('user')) {
            $data['title'] = 'AMSM - Warga';
        } elseif (in_groups('petugas')) {
            $data['title'] = 'AMSM - Petugas';
        } elseif (in_groups('admin')) {
            $data['title'] = 'AMSM - Admin';
        }

        $data['user'] = user();
        $data = [
            'tanggal_surat' => date("Y-m-d H:i:s"),
            'jenis' => $this->request->getVar('jenis'),
            'perihal' => $this->request->getVar('perihal'),
            'keperluan' => $this->request->getVar('keperluan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => 'antre',
        ];

        $id_surat = $this->request->getVar('id_surat');

        if ($this->sm->updateSurat($id_surat, $data)) {
            session()->setFlashdata('Berhasil', 'Surat berhasil diupdate');
            return redirect()->to(base_url('/pengajuan-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Surat gagal diupdate, pastikan masukan setiap kolom sesuai');
            return redirect()->to(base_url('/pengajuan-surat'));
        }

        return view('pengajuan_surat', $data);
    }
}
