<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

use Myth\Auth\Entities\User;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Password;



class Admin extends BaseController
{
    protected $um;
    protected $config;
    protected $auth;

    public function __construct()
    {
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }
        
        $this->um = new UserModel();

        $this->config = config('Auth');
        $this->auth = service('authentication');
    }


    public function manajemen_user()
    {
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }
        
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        $groupModel = new GroupModel();

        foreach ($data['users'] as $row) {
            $dataRow['group'] = $groupModel->getGroupsForUser($row->id);
            $dataRow['row'] = $row;
            $data['row' . $row->id] = view('user/admin/row', $dataRow);
        }

        $data['groups'] = $groupModel->findAll();
        $data['title'] = 'AMSM - Admin';

        return view('user/admin/manajemen_user', $data);
    }

    public function manajemen_user_edit($id)
    {
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }
        
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        $data['title'] = 'AMSM - Admin';

        return view('user/admin/manajemen_user_edit', $data);
    }

    public function tambah_user()
    {
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }
        
        $users = model(UserModel::class);

        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (!empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            $sent = $activator->send($user);

            if (!$sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->to(base_url('/manajemen-user'))->with('Berhasil', lang('Auth.activationSuccess'));
        }

        // Success!
        return redirect()->to(base_url('/manajemen-user'))->with('Berhasil', 'Berhasil menambahkan user');
    }

    //ubah group user
    public function ubah_group()
    {
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }
        
        $userId = $this->request->getVar('id');
        $groupId = $this->request->getVar('group');

        $groupModel = new GroupModel();
        $groupModel->removeUserFromAllGroups(intval($userId));

        $groupModel->addUserToGroup(intval($userId), intval($groupId));

        return redirect()->to(base_url('/manajemen-user'))->with('Berhasil', 'Berhasil mengubah group user');
    }

    public function update_pass($id = null)
    {
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }
        
        if ($id == null) {
            return redirect()->to(base_url('/users/index'));
        } else {
            $data = [
                'id' => $id,
                'title' => 'Update Password',
            ];
            return view('user/admin/update_pass', $data);
        }
    }


    public function set_password()
    {
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }
        

        $id = $this->request->getVar('id');
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'id' => $id,
                'title' => 'Update Password',
                'validation' => $this->validator,
            ];

            return view('user/admin/update_pass', $data);
        } else {
            $userModel = new UserModel();
            $data = [
                'password_hash' => Password::hash($this->request->getVar('password')),
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null,
            ];

            $userModel->update($this->request->getVar('id'), $data);

            return redirect()->to(base_url('/manajemen-user'))->with('Berhasil', 'Berhasil mengubah password user');
        }
    }

    //hapus user
    public function hapus_user($id = null)
    {
        if (logged_in()) {
            foreach (user()->getRoles() as $role) {
                if (!in_array($role, ['admin', 'petugas'])) {
                    if (user()->kelurahan && user()->kelurahan != "PODOSARI") {
                        return redirect()->to(base_url('/error?code=403'));
                    }
                }
            }
        }
        
        if ($id == null) {
            return redirect()->to(base_url('/manajemen-user'));
        } else {
            $userModel = new UserModel();
            $userModel->delete($id);
            return redirect()->to(base_url('/manajemen-user'))->with('Berhasil', 'Berhasil menghapus user');
        }
    }
}
