<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected   $table = "user";
    protected   $primaryKey = "id";
    protected   $allowedFields = ['username', 'fullname', 'img_user', 'alamat'];

    
}
