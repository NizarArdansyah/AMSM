<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $um;

    public function __construct()
    {
        $this->um = new UserModel();
    }

    public function index()
    {
    }

    public function manajemen_user()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, img_user, fullname, nik, ttl, agama, pekerjaan, kewarganegaraan, users.username, users.email,  users.created_at, users.updated_at, auth_groups.name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['users'] = $query->getResult();
        $data['title'] = 'AMSM - Admin';
        return view('user/admin/manajemen_user', $data);
    }

    public function tambah_user()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id, img_user, fullname, nik, ttl, agama, pekerjaan, kewarganegaraan, users.username, users.email,  users.created_at, users.updated_at, auth_groups.name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();

        $data['title'] = 'AMSM - Admin';
        $data['users'] = $query->getResult();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'fullname' => 'required',
                // 'nik' => 'required',
                // 'ttl' => 'required',
                // 'kewarganegaraan' => 'required',
                // 'agama' => 'required',
                // 'pekerjaan' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'password_confirm' => 'required|matches[password]',
                'name' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $newData = [
                    'fullname' => $this->request->getVar('fullname'),
                    // 'nik' => $this->request->getVar('nik'),
                    // 'ttl' => $this->request->getVar('ttl'),
                    // 'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                    // 'agama' => $this->request->getVar('agama'),
                    // 'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'name' => $this->request->getVar('group'),
                ];

                $this->um->save([
                    'fullname' => $newData['fullname'],
                    // 'nik' => $newData['nik'],
                    // 'ttl' => $newData['ttl'],
                    // 'kewarganegaraan' => $newData['kewarganegaraan'],
                    // 'agama' => $newData['agama'],
                    // 'pekerjaan' => $newData['pekerjaan'],
                    'username' => $newData['username'],
                    'email' => $newData['email'],
                    'password_hash' => password_hash($newData['password'], PASSWORD_DEFAULT),
                    'img_user' => 'default.svg',
                    'active' => 1,
                ]);

                $user_id = $this->um->getInsertID();

                $this->um->saveGroup([
                    'user_id' => $user_id,
                    'group_id' => $newData['group'],
                ]);
            }
        }

        return view('user/admin/manajemen_user', $data);
    }
}
