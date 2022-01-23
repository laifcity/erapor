<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Auth\Model_Auth;
use App\Models\Admin\Model_Guru;
use App\Models\Admin\Model_Kelas;
use App\Models\Admin\Model_Tahun;
// use App\Models\Admin\Model_Jurusan;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->Model_Auth = new Model_Auth();
        $this->Model_Guru = new Model_Guru();
        $this->Model_Kelas = new Model_Kelas();
        $this->Model_Tahun = new Model_Tahun();
        // $this->Model_Jurusan = new Model_Jurusan();
    }

    //--------------------------------------------//

    public function index()
    {
        $data['title'] = 'Login';
        return view('index', $data);
        // return view('auth/login', $data);
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
                    session()->set('username', $cek_user['username']);
                    // session()->set('id_ptk', $cek_user['id_ptk']);
                    session()->set('level', $level);
                    session()->set('foto', $cek_user['foto']);

                    return redirect()->to('/admin/dashboard');
                } else {
                    //Jika data tidak ada
                    Session()->setFlashdata('pesan, login Gagal!, Username atau Password Salah');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 2) {
                $cek_wali = $this->Model_Auth->login_wali($username, $password);
                if ($cek_wali) {
                    //Jika data ada
                    // session()->set('log', true);
                    session()->set('username', $cek_wali['niy']);
                    session()->set('nama', $cek_wali['nama_ptk']);
                    session()->set('kelas', $cek_wali['kode_kelas']);
                    session()->set('rombel', $cek_wali['id_rombel']);
                    session()->set('jurusan', $cek_wali['komp_keahlian']);
                    session()->set('level', $level);
                    session()->set('foto', $cek_wali['foto_ptk']);

                    return redirect()->to('/walikelas/dashboard');
                } else {
                    //Jika data tidak ada
                    Session()->setFlashdata('pesan, login Gagal!, Username atau Password Salah');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 3) {
                $cek_ptk = $this->Model_Auth->login_ptk($username, $password);
                if ($cek_ptk) {
                    //Jika data ada
                    session()->set('log', true);
                    session()->set('username', $cek_ptk['niy']);
                    session()->set('nama', $cek_ptk['nama_ptk']);
                    session()->set('level', $level);
                    session()->set('foto', $cek_ptk['foto_ptk']);

                    return redirect()->to('/guru/dashboard');
                } else {
                    //Jika data tidak ada
                    Session()->setFlashdata('pesan, login Gagal!, Username atau Password Salah');
                    return redirect()->to(base_url('auth'));
                }
            } elseif ($level == 4) {
                $cek_siswa = $this->Model_Auth->login_siswa($username, $password);
                if ($cek_siswa) {
                    //Jika data ada
                    session()->set('username', $cek_siswa['nisn']);;
                    session()->set('nama', $cek_siswa['nama_siswa']);
                    session()->set('foto', $cek_siswa['foto_siswa']);
                    session()->set('level', $level);

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
