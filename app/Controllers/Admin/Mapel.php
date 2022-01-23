<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Mapel;

class Mapel extends BaseController
{
    // protected $Model_Mapel;

    public function __construct()
    {
        $this->Model_Mapel = new Model_Mapel();
    }

    public function index()
    {
        $mapel  = $this->Model_Mapel->allData();
        $data   = [
            'title'         => 'Mapel',
            'judul'         => 'Data Mapel',
            'add'           => 'Tambah Data Mapel',
            'edit'          => 'Edit Data Mapel',
            'delete'        => 'Delete Data Mapel',
            'mapel'       => $mapel
        ];
        return render('admin/mapel/v_mapel', $data);
    }

    //--------------------------------------------------

    public function add()
    {
        $data = [
            'k_mapel'   => $this->request->getVar('k_mapel'),
            'mapel'     => $this->request->getVar('mapel'),
        ];
        $this->Model_Mapel->add($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('admin/mapel'));
    }

    //--------------------------------------------------

    public function edit($id_mapel)
    {
        $data = [
            'id_mapel'   => $id_mapel,
            'k_mapel'    => $this->request->getVar('k_mapel'),
            'mapel'  => $this->request->getVar('mapel'),
        ];
        $this->Model_Mapel->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('admin/mapel'));
    }

    //--------------------------------------------------

    public function delete($id_mapel)
    {
        $data = [
            'id_mapel'   => $id_mapel,
        ];
        $this->Model_Mapel->deleteData($data);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to(base_url('admin/mapel'));
    }
}
