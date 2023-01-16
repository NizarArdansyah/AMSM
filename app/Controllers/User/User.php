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
        $data['title'] = 'AMSM - Warga';
        return view('user/warga/profil', $data);
    }

    public function pengajuan_surat()
    {
        $data['title'] = 'AMSM - Warga';
        $data['user'] = user();
        $data['id_user'] = user_id();
        $data['surat'] = $this->sm->getSuratByID(user_id());
        return view('pengajuan_surat', $data);
    }



    public function buat_pengajuan_surat()
    {

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

        if ($this->sm->save($data)) {
            session()->setFlashdata('Berhasil', 'Surat berhasil diajukan');
            return redirect()->to(base_url('/pengajuan-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Surat gagal diajukan, pastikan masukan setiap kolom sesuai');
            return redirect()->to(base_url('/pengajuan-surat'));
        }
        $data['title'] = 'AMSM - Warga';
        $data['user'] = user();

        return view('pengajuan_surat', $data);
    }

    public function update_pengajuan_surat()
    {
        $data['title'] = 'AMSM - Warga';
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
