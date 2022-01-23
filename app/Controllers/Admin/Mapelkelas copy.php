<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Mapel_Kelas;
use App\Models\Admin\Model_Mapel;
use App\Models\Admin\Model_Kelas;
use App\Models\Admin\Model_Guru;

class Mapelkelas extends BaseController
{
    protected $Model_Mapel_Kelas, $Model_Mape, $Model_Kelas, $Model_Guru;

    public function __construct()
    {
        $this->Model_Mapel_Kelas = new Model_Mapel_Kelas();
        $this->Model_Mapel = new Model_Mapel();
        $this->Model_Kelas = new Model_Kelas();
        $this->Model_Guru = new Model_Guru();
    }

    public function index()
    {
        $mapelkelas = $this->Model_Mapel_Kelas->allData();
        $mapel      = $this->Model_Mapel->allData();
        $kelas      = $this->Model_Kelas->allData();
        $guru       = $this->Model_Guru->allData();
        $data   = [
            'title'       => 'Mapel Kelas',
            'judul'       => 'Data Mapel Kelas',
            'add'         => 'Tambah Data Mapel Kelas',
            'edit'        => 'Edit Data Mapel Kelas',
            'delete'      => 'Delete Data Mapel Kelas',
            'mapelkelas'  => $mapelkelas,
            'mapel'       => $mapel,
            'kelas'       => $kelas,
            'guru'        => $guru,
        ];
        return render('admin/mapel/v_mapelkelas', $data);
    }

    //--------------------------------------------------

    public function add()
    {
        $data = [
            'id_kelas'   => $this->request->getVar('id_kelas'),
            'id_mapel'   => $this->request->getVar('id_mapel'),
            'id_ptk'     => $this->request->getVar('id_ptk'),
        ];
        $this->Model_Mapel_Kelas->add($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('admin/mapelkelas'));
    }

    //--------------------------------------------------

    public function edit($id_mapel)
    {
        $data = [
            'id_mapel'  => $id_mapel,
            'k_mapel'   => $this->request->getVar('k_mapel'),
            'mapel'     => $this->request->getVar('mapel'),
        ];
        $this->Model_Mapel_Kelas->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('admin/mapelkelas'));
    }

    //--------------------------------------------------

    public function delete($id_mapel)
    {
        $data = [
            'id_mapel'   => $id_mapel,
        ];
        $this->Model_Mapel_Kelas->deleteData($data);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to(base_url('admin/mapelkelas'));
    }
}
