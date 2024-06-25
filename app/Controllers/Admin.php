<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Admin extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // Fetch all users from the database

        return view('admin/dashboard', $data); // Pass $data array to the view
    }

    public function manageUsers()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll(); // Fetch all users from the database

        return view('admin/manage_users', $data); // Pass $data array to the view
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
            $userModel->insert($data); // Insert new user record into the database

            return redirect()->to('admin/manageUsers'); // Redirect to manageUsers page after successful creation
        }

        return view('admin/create_user'); // Load the create user form view
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
            $userModel->save($data); // Save updated user data to the database

            return redirect()->to('admin/manageUsers'); // Redirect to manageUsers page after successful update
        }

        $data['user'] = $userModel->find($id); // Fetch user data based on $id parameter

        return view('admin/edit_user', $data); // Load the edit user form view with user data
    }

    public function deleteUser($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id); // Delete user from the database based on $id parameter

        return redirect()->to('admin/manageUsers'); // Redirect to manageUsers page after successful deletion
    }
}
