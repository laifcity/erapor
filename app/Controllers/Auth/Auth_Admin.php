<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class Auth_Admin extends BaseController
{

    public function index()
    {
        $data['title'] = 'Login';
        return view('auth/login', $data);
    }
    //--------------------------------------------//
    //--------------------------------------------//

    public function cek_login()
    {
        if ($this->validate([
            'username'  => [
                'label'     => 'Username',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi !'
                ]
            ],
            'level'  => [
                'label'     => 'Level',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi !'
                ]
            ],
            'password'  => [
                'label'     => 'Password',
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi !'
                ]
            ],
        ])) {
            //Jika valid
            $level = $this->request->getVar('level');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            if ($level == 1) {
                $cek_user = $this->Model_Auth->login_user($username, $password);
                if ($cek_user) {
                    //Jika data ada
                    session()->set('log', true);
                    session()->set('username', $cek_user['username']);
                    session()->set('id_ptk', $cek_user['id_ptk']);
                    session()->set('level', $level);
                    // session()->set('foto', $cek_user['foto']);

                    return redirect()->to('/admin/dashboard');
                } else {
                    //Jika data tidak ada
                    Session()->setFlashdata('pesan, login Gagal!, Username atau Password Salah');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 2) {
                $cek_user = $this->Model_Auth->login_user($username, $password);
                if ($cek_user) {
                    //Jika data ada
                    session()->set('log', true);
                    session()->set('username', $cek_user['username']);
                    session()->set('id_ptk', $cek_user['id_ptk']);
                    session()->set('level', $level);
                    // session()->set('foto', $cek_user['foto']);

                    return redirect()->to('/wali/dashboard');
                } else {
                    //Jika data tidak ada
                    Session()->setFlashdata('pesan, login Gagal!, Username atau Password Salah');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 3) {
                $cek_ptk = $this->Model_Auth->login_ptk($username, $password);
                if ($cek_ptk) {
                    //Jika data ada
                    session()->set('username', $cek_ptk['niy']);
                    session()->set('id_ptk', $cek_ptk['id_ptk']);
                    session()->set('level', $level);
                    session()->set('foto', $cek_ptk['foto_ptk']);

                    return redirect()->to('/ptk/dashboard');
                } else {
                    //Jika data tidak ada
                    Session()->setFlashdata('pesan, login Gagal!, Username atau Password Salah');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 4) {
                $cek_siswa = $this->Model_Auth->login_siswa($username, $password);
                if ($cek_siswa) {
                    //Jika data ada
                    session()->set('username', $cek_siswa['nisn']);
                    session()->set('id_siswa', $cek_siswa['id_siswa']);
                    // session()->set('nama', $cek_siswa['nama_siswa']);
                    // session()->set('foto', $cek_siswa['foto_siswa']);
                    session()->set('level', $level);
                    // session()->set('foto', $cek_user['foto']);

                    return redirect()->to('/siswa/dashboard');
                } else {
                    //Jika data tidak ada
                    Session()->setFlashdata('pesan, login Gagal!, Username atau Password Salah');
                    return redirect()->to(base_url('auth'));
                }
            }
        } else {
            //Jika tidak valid 
            Session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }
    }

    //--------------------------------------------//

    public function logout()
    {
        // session()->remove('log');
        // session()->remove('username');
        // session()->remove('id_ptk');
        // // session()->remove('foto');
        // session()->remove('level');
        
        session()->destroy();
        Session()->setFlashdata('sukses, Logout Berhasil !');
        return redirect()->to(base_url('/'));
    }
}
