<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Halaman Login
    public function login()
    {
        return view('auth/login', ['title' => 'Login | RafOzone']);
    }

    // Proses Login
    public function cek_login()
    {
        $session = session();
        $model = new UserModel();

        $email    = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if ($password == $user['password']) {

                $session->set([
                    'id_user'   => $user['id_user'],
                    'nama'      => $user['nama'],
                    'role'      => $user['role'],
                    'logged_in' => true
                ]);

                // Admin ke Dashboard, Customer ke Home
                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    return redirect()->to('/');
                }
            }
        }

        return redirect()->back()->with('error', 'Email atau Password salah!');
    }

    // Halaman Register
    public function register()
    {
        return view('auth/register', ['title' => 'Daftar Akun | RafOzone']);
    }

    // Simpan Register
    public function simpan_register()
    {
        $model = new UserModel();

        $data = [
            'nama'     => $this->request->getVar('nama'),
            'email'    => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'role'     => 'customer'
        ];

        $model->save($data);

        return redirect()->to('/login')->with('success', 'Akun berhasil dibuat!');
    }

    // Logout
    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}