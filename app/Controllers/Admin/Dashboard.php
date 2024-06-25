<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Dashboard extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('admin/dashboard', $data);
    }

    public function manageUsers()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('admin/manage_users', $data);
    }

    public function createUser()
    {
        $userModel = new UserModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];
            $userModel->insert($data);

            return redirect()->to('admin/manageUsers');
        }

        return view('admin/create_user');
    }

    public function editUser($id)
    {
        $userModel = new UserModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'id' => $id,
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);

            return redirect()->to('admin/manageUsers');
        }

        $data['user'] = $userModel->find($id);

        return view('admin/edit_user', $data);
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('admin/manageUsers');
    }
}
