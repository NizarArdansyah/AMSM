<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'surat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id_user", "nomor_surat", "tanggal_surat", "pemohon", "perihal", "keperluan", "keterangan", "jenis", "status", "pesan"
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // cek profil apakah sudah lengkap atau belum
    public function cekProfil($id_user)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $id_user);
        $data = $builder->get()->getResultObject();

        if ($data[0]->fullname == null || $data[0]->alamat == null || $data[0]->nik == null || $data[0]->kk == null || $data[0]->tempat_lahir == null || $data[0]->tgl_lahir == null || $data[0]->kewarganegaraan == null || $data[0]->agama == null || $data[0]->pekerjaan == null) {
            return false;
        }
        return true;
    }

    //menampilkan data kk user
    public function getKK()
    {
        $builder = $this->db->table('users');
        $data = $builder->get()->getResultObject();
        return $data[0]->kk;
    }

    //menampilkan data surat berdasarkan id user
    public function getSuratByID($id)
    {
        $builder = $this->db->table('surat');
        $builder->where('id_user', $id);
        $data = $builder->get()->getResultObject();
        return $data;
    }

    //menampilkan data surat berdasarkan id surat
    public function getSuratByIDSurat($id)
    {
        $builder = $this->db->table('surat');
        $builder->where('id', $id);
        $data = $builder->get()->getResultObject();
        return $data;
    }

    //menampilkan semua data surat 
    function getSurats()
    {
        $builder = $this->db->table('surat');
        $data = $builder->get()->getResultObject();
        return $data;
    }

    //mengambil nomor surat terakhir
    private function get_nomor_surat()
    {
        $builder = $this->db->table('surat');

        //jika belum ada data surat maka nomor surat akan diisi 001/Ds.04/XII/2022
        if ($builder->countAllResults() == 0) {
            return '001/Ds.04/XII/2022';
        }
        $builder->selectMax('nomor_surat');
        $data = $builder->get()->getResultObject();
        return $data[0]->nomor_surat;
    }

    //mengenerate nomor surat
    public function generate_nomor_surat()
    {

        $array_bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $bln = $array_bln[date('n')];

        $nomor_surat = $this->get_nomor_surat();
        $kode = explode('/', $nomor_surat);
        $kode = $kode[0];
        $kode = $kode + 1;
        if ($kode < 10) {
            return '00' . $kode . "/Ds.04/" . $bln . "/" . date('Y');
        } elseif ($kode < 100) {
            return '0' . $kode . "/Ds.04/" . $bln . "/" . date('Y');
        } else {
            return $kode . "/Ds.04/" . $bln . "/" . date('Y');
        }
    }

    //menghapus data surat berdasarkan id surat
    public function deleteSurat($id)
    {
        $builder = $this->db->table('surat');
        $builder->where('id', $id);
        return $builder->delete();
    }

    //mengetahui siapa yang mengajukan surat saat pengajuan
    function getPemohon($id)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        $data = $builder->select('fullname')->get()->getResultObject();
        return $data[0]->fullname;
    }

    // untuk mendapatkan data user berdasarkan pemohon surat
    function getUserBySurat($id_pemohon)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $id_pemohon);
        $data = $builder->get()->getResultObject();
        return $data;
    }

    // mengupdate data surat
    function updateSurat($id, $data)
    {
        $builder = $this->db->table('surat');
        $builder->where('id', $id);
        return $builder->update($data);
    }

    //mengupdate data user
    function updateProfil($id, $data)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        return $builder->update($data);
    }
}
