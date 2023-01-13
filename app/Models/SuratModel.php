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
        $builder->selectMax('nomor_surat');
        $data = $builder->get()->getResultObject();
        return $data[0]->nomor_surat;
    }

    public function generate_nomor_surat()
    {
        $nomor_surat = $this->get_nomor_surat();
        $kode = explode('/', $nomor_surat);
        $kode = $kode[0];
        $kode = $kode + 1;
        if ($kode < 10) {
            return '00' . $kode . '/Ds.04/XII/2022';
        } elseif ($kode < 100) {
            return '0' . $kode . '/Ds.04/XII/2022';
        } else {
            return $kode . '/Ds.04/XII/2022';
        }
        // return $kode . '/Ds.04/XII/2022';
    }


    function getPemohon($id)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        $data = $builder->select('username')->get()->getResultObject();
        return $data[0]->username;
    }

    function updateSurat($id, $data)
    {
        $builder = $this->db->table('surat');
        $builder->where('id', $id);
        return $builder->update($data);
    }
}
