<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Jurusan;

class Jurusan extends BaseController
{
    // protected $Model_Jurusan;

    public function __construct()
    {
        $this->Model_Jurusan = new Model_Jurusan();
    }

    public function index()
    {
        $jurusan  = $this->Model_Jurusan->allData();
        $data   = [
            'title'         => 'Jurusan',
            'judul'         => 'Data Jurusan',
            'add'           => 'Tambah Data Jurusan',
            'edit'          => 'Edit Data Jurusan',
            'delete'        => 'Delete Data Jurusan',
            'jurusan'       => $jurusan
        ];
        return render('admin/jurusan/v_jurusan', $data);
    }

    //--------------------------------------------------

    public function add()
    {
        $data = [
            'k_keahlian'    => $this->request->getVar('k_keahlian'),
            'bid_keahlian'  => $this->request->getVar('bid_keahlian'),
            'prog_keahlian' => $this->request->getVar('prog_keahlian'),
            'komp_keahlian' => $this->request->getVar('komp_keahlian'),
        ];
        $this->Model_Jurusan->add($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('admin/jurusan'));
    }

    //--------------------------------------------------

    public function edit($id_keahlian)
    {
        $data = [
            'id_keahlian'   => $id_keahlian,
            'k_keahlian'    => $this->request->getVar('k_keahlian'),
            'bid_keahlian'  => $this->request->getVar('bid_keahlian'),
            'prog_keahlian' => $this->request->getVar('prog_keahlian'),
            'komp_keahlian' => $this->request->getVar('komp_keahlian'),
        ];
        $this->Model_Jurusan->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('admin/jurusan'));
    }

    //--------------------------------------------------

    public function delete($id_keahlian)
    {
        $data = [
            'id_keahlian'   => $id_keahlian,
        ];
        $this->Model_Jurusan->deleteData($data);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to(base_url('admin/jurusan'));
    }
}
