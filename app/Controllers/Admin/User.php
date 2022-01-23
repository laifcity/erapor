<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_User;
use App\Models\Admin\Model_Siswa;
use App\Models\Admin\Model_Guru;
use App\Models\Admin\Model_Group_User;
use App\Models\Admin\Model_Rombel;

class User extends BaseController
{

    // protected $Model_User, $Model_Guru, $Model_Group_User;

    public function __construct()
    {
        $this->Model_User = new Model_User();
        $this->Model_Siswa = new Model_Siswa();
        $this->Model_Guru = new Model_Guru();
        $this->Model_Group_User = new Model_Group_User();
        $this->Model_Rombel = new Model_Rombel();
    }

    public function index()
    {
        $user   = $this->Model_User->allData();
        $guru    = $this->Model_Guru->allData();
        $level  = $this->Model_Group_User->findAll();
        $data   = [
            'title'   => 'User',
            'judul'   => 'Data User',
            'add'     => 'Tambah Data User',
            'edit'    => 'Edit Data User',
            'delete'  => 'Delete Data User',
            'user'    => $user,
            'ptk'     => $guru,
            'level'   => $level,
        ];
        return render('admin/setting/v_user', $data);
    }

    //--------------------------------------------------

    public function user_ptk()
    {
        $guru    = $this->Model_Guru->allData();
        $data   = [
            'title'   => 'Setting Guru',
            'judul'   => 'Data Guru  ',
            'guru'    => $guru,
        ];
        return render('admin/setting/v_guru', $data);
    }

    //--------------------------------------------------

    public function user_wali()
    {
        $guru    = $this->Model_Guru->allData();
        $rombel  = $this->Model_Rombel->allData();
        $data   = [
            'title'   => 'Wali Kelas',
            'judul'   => 'Data Wali Kelas  ',
            'guru'    => $guru,
            'rombel'  => $rombel,

        ];
        return render('admin/setting/v_wali', $data);
    }

    //--------------------------------------------------

    public function user_siswa()
    {
        $siswa   = $this->Model_Siswa->allData();
        $data   = [
            'title'   => 'Setting Siswa',
            'judul'   => 'Data Siswa  ',
            'siswa'    => $siswa,
        ];
        return render('admin/setting/v_siswa', $data);
    }

    //--------------------------------------------------

    public function add()
    {
        $data = [
            'id_ptk'    => $this->request->getVar('id_ptk'),
            'username'  => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
            'level'     => '1',
        ];
        $this->Model_User->add($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('admin/user'));
    }

    //--------------------------------------------------

    public function edit($id_user)
    {
        $data = [
            'id_user'   => $id_user,
            'id_ptk'    => $this->request->getVar('id_ptk'),
            'username'  => $this->request->getVar('username'),
            'password'  => $this->request->getVar('password'),
            'level'     => '1',
        ];
        $this->Model_User->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('admin/user'));
    }

    //--------------------------------------------------

    public function delete($id_user)
    {
        $resetuser   = $this->Model_User->allData();
        $data = [
            'id_user'   => $id_user,
        ];
        $this->Model_User->deleteData($data);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to(base_url('admin/user'));
    }

    //--------------------------------------------------

    public function resetuser($id_user)
    {
        //Reset Password
        $this->Model_User->resetuser($id_user);
        //Setting Tahun Pelajaran
        $data = [
            'id_user'   => $id_user,
            'password'  => 123456,
        ];
        $this->Model_User->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('admin/user'));
    }

    //--------------------------------------------------

    public function resetwali($id_rombel)
    {
        //Reset Password
        $this->Model_User->resetwali($id_rombel);
        //Setting Tahun Pelajaran
        $data = [
            'id_rombel'   => $id_rombel,
            'password'   => 123456,
        ];
        $this->Model_Rombel->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('admin/user/user_wali'));
    }
}
