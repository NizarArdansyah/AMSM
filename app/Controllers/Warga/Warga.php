<?php


namespace App\Controllers\Warga;

use App\Controllers\BaseController;

use App\Models\SuratModel;



class Warga extends BaseController
{
    protected $sm;

    public function __construct()
    {
        $this->sm = new SuratModel();
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
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'agama' => $this->request->getVar('agama'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
        ];

        $id_user = $this->request->getVar('id_user');

        if ($this->sm->updateProfil($id_user, $data)) {
            session()->setFlashdata('Berhasil', 'Profil berhasil diperbarui');
            if (in_groups('admin')) {
                return redirect()->to(base_url('/manajemen-user'));
            }
            return redirect()->to(base_url('/profil'));
        } else {
            session()->setFlashdata('Gagal', 'Profil gagal diperbarui, pastikan masukan setiap kolom sesuai');
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
        $data['profil_lengkap'] = $this->sm->cekProfil(user_id());

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

        $data = [
            'id_user' => user_id(),
            'nomor_surat' => $this->sm->generate_nomor_surat(),
            'tanggal_surat' => date('Y-m-d H:i:s'),
            'pemohon' => $this->sm->getPemohon($this->request->getPost('pemohon')),
            'perihal' => $this->request->getVar('perihal'),
            'keperluan' => $this->request->getVar('keperluan'),
            'jenis' => $this->request->getVar('jenis'),
            'status' => 'antre',
        ];

        $profil_lengkap = $this->sm->cekProfil($this->request->getPost('pemohon'));

        if ($profil_lengkap) {
            if ($this->sm->insert($data)) {
                session()->setFlashdata('Berhasil', 'Surat berhasil diajukan');
                return redirect()->to(base_url('/manajemen-surat'));
            } else {
                session()->setFlashdata('Gagal', 'Surat gagal diajukan, pastikan masukan setiap kolom sesuai');
                return redirect()->to(base_url('/manajemen-surat'));
            }
        } else {
            session()->setFlashdata('Gagal', 'Surat gagal diajukan, pastikan profil lengkap');
            return redirect()->to(base_url('/manajemen-surat'));
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
            'status' => 'antre',
        ];

        $id_surat = $this->request->getVar('id_surat');

        if ($this->sm->updateSurat($id_surat, $data)) {
            session()->setFlashdata('Berhasil', 'Surat berhasil diperbarui');
            return redirect()->to(base_url('/pengajuan-surat'));
        } else {
            session()->setFlashdata('Gagal', 'Surat gagal diperbarui, pastikan masukan setiap kolom sesuai');
            return redirect()->to(base_url('/pengajuan-surat'));
        }

        return view('pengajuan_surat', $data);
    }

    // upload kartu keluarga
    public function upload_kk()
    {
        if (
            !$this->validate([
                'kk' => [
                    'rules' => 'uploaded[kk]|mime_in[kk,image/jpg,image/jpeg,image/png]|max_size[kk,2048]',
                    'errors' => [
                        'uploaded' => 'Harus Ada File yang diupload',
                        'mime_in' => 'File Extention Harus Berupa jpg,jpeg,png',
                        'max_size' => 'Ukuran File Maksimal 2 MB'
                    ]

                ]
            ])
        ) {
            session()->setFlashdata('Gagal', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data['user'] = user();
        $data['id_user'] = user_id();
        $data['surat'] = $this->sm->getSuratByID(user_id());
        $data['profil_lengkap'] = $this->sm->cekProfil(user_id());

        $file = $this->request->getFile('kk');
        $file->move('uploads/kk');
        $data = [
            'kk' => $file->getName(),
        ];

        $id_user = $this->request->getVar('id_user');

        if ($this->sm->updateProfil($id_user, $data)) {
            session()->setFlashdata('Berhasil', 'Kartu Keluarga berhasil diupload');
            return redirect()->to(base_url('/profil'));
        } else {
            session()->setFlashdata('Gagal', 'Kartu Keluarga gagal diupload');
            return redirect()->to(base_url('/profil'));
        }

        return view('profil', $data);
    }
}