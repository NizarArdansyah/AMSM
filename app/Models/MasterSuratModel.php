<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterSuratModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'master_surat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 58347;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jenis_surat',
    ];
}
