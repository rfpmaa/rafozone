<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // 1. Fungsi Halaman Login
    public function login()
    {
        return view('auth/login', ['title' => 'Login | RafOzone']);
    }

    // 2. Fungsi Cek Login
    public function cek_login()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $user = $model->where('email', $email)->first();

        if($user) {
            if($password == $user['password']) {
                $session->set([
                    'id_user'   => $user['id_user'],
                    'nama'      => $user['nama'],
                    'role'      => $user['role'],
                    'logged_in' => TRUE
                ]);

                return ($user['role'] == 'admin') ? redirect()->to('/admin/dashboard') : redirect()->to('/layanan');
            }
        }
        return redirect()->back()->with('error', 'Email atau Password salah!');
    }

    // 3. FUNGSI REGISTER (PASTIKAN CUMA ADA SATU INI)
    public function register()
    {
        return view('auth/register', ['title' => 'Daftar Akun | RafOzone']);
    }

    // 4. Fungsi Simpan Register
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

    // 5. Fungsi Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}