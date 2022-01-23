<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Tahun;

class Tahun extends BaseController
{
    public function __construct()
    {
        $this->Model_Tahun = new Model_Tahun();
    }

    public function index()
    {
        $tahun  = $this->Model_Tahun->allData();
        $ta_aktif  = $this->Model_Tahun->ta_aktif();
        $data   = [
            'title'       => 'Tahun Pelajaran',
            'judul'       => 'Data Tahun Pelajaran',
            'add'         => 'Tambah Data Tahun Pelajaran',
            'edit'        => 'Edit Data Tahun Pelajaran',
            'delete'      => 'Delete Data Tahun Pelajaran',
            'tahun'       => $tahun,
            'ta_aktif'       => $ta_aktif,
        ];
        return render('admin/tahun/index', $data);
    }

    //--------------------------------------------------

    public function add()
    {
        $data = [
            'tahun' => $this->request->getVar('tahun'),
            'smt'   => $this->request->getVar('smt'),
        ];
        $this->Model_Tahun->add($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('admin/tahun'));
    }

    //--------------------------------------------------

    public function edit($id_tahun)
    {
        $data = [
            'id_tahun'  => $id_tahun,
            'tahun'     => $this->request->getVar('tahun'),
            'smt'       => $this->request->getVar('smt'),
        ];
        $this->Model_Tahun->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('admin/tahun'));
    }

    //--------------------------------------------------

    public function delete($id_tahun)
    {
        $data = [
            'id_tahun'   => $id_tahun,
        ];
        $this->Model_Tahun->deleteData($data);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to(base_url('admin/tahun'));
    }

    public function setting()
    {
        $tahun  = $this->Model_Tahun->allData();
        $data   = [
            'title'       => 'Setting Tahun Pelajaran',
            'judul'       => 'Data Tahun Pelajaran Aktif',
            'tahun'       => $tahun
        ];
        return render('admin/tahun/set_ta', $data);
    }

    public function set_status_ta($id_tahun)
    {
        //Reset Status Tahun Pelajaran
        $this->Model_Tahun->reset_status_ta();
        //Setting Tahun Pelajaran
        $data   = [
            'id_tahun'    => $id_tahun,
            'status'      => 1,
        ];
        $this->Model_Tahun->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('admin/tahun/setting'));
    }
}
