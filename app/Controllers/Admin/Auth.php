<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use CodeIgniter\Shield\Config\Auth as ShieldAuthConfig;

class Auth extends Controller
{
    protected $shield;

    public function __construct()
    {
        $this->shield = service('shield');
    }

    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        try {
            $user = $this->shield->attempt([$username, $password], ShieldAuthConfig::MODEL_USER);
            return redirect()->to('admin/dashboard');
        } catch (\Exception $e) {
            return redirect()->to('admin/login')->with('error', 'Invalid username or password.');
        }
    }

    public function logout()
    {
        $this->shield->logout();
        return redirect()->to('admin/login');
    }
}
