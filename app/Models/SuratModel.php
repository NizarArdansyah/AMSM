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
    protected $allowedFields    = ["id_user", "judul", "nomor_surat", "tanggal_surat", "pemohon", "perihal", "keperluan", "keterangan", "jenis", "status"];

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

    public function getSuratByID($id)
    {
        $builder = $this->db->table('surat');
        $builder->where('id_user', $id);
        $data = $builder->get()->getResultObject();
        return $data;
    }

    public function getSuratByIDSurat($id)
    {
        $builder = $this->db->table('surat');
        $builder->where('id', $id);
        $data = $builder->get()->getResultObject();
        return $data;
    }

    function getSurats()
    {
        $builder = $this->db->table('surat');
        $data = $builder->get()->getResultObject();
        return $data;
    }

    private function get_nomor_surat()
    {
        $builder = $this->db->table('surat');
        if ($builder->countAllResults() == 0) {
            return '001/Ds.04/XII/2022';
        }
        $builder->selectMax('nomor_surat');
        $data = $builder->get()->getResultObject();
        return $data[0]->nomor_surat;
    }

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

    public function deleteSurat($id)
    {
        $builder = $this->db->table('surat');
        $builder->where('id', $id);
        return $builder->delete();
    }

    //untuk mengetahui siapa yang mengajukan surat
    function getPemohon($id)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        $data = $builder->select('username')->get()->getResultObject();
        return $data;
    }

    // untuk mendapatkan data user berdasarkan pemohon
    function getUserBySurat()
    {
        $builder = $this->db->table('surat');
        $builder->join('users', 'users.id = surat.id_user');
        $data = $builder->get()->getResultObject();
        return $data;
    }

    function updateSurat($id, $data)
    {
        $builder = $this->db->table('surat');
        $builder->where('id', $id);
        return $builder->update($data);
    }

    function updateProfil($id, $data)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        return $builder->update($data);
    }
}
