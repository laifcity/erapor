<?php

namespace App\Controllers\Walikelas;

use App\Controllers\BaseController;
use App\Models\Walikelas\C_Academic_Model;
use App\Models\Walikelas\WaliKelas_Model;

class C_Academic extends BaseController
{
    public function __construct()
    {
        $this->C_Academic_Model = new C_Academic_Model();
        $this->WaliKelas_Model = new WaliKelas_Model();
    }

    public function catatan_academic($id_rombel)
    {
        $data   = [
            'title'       => 'Catatan Academic ',
            'judul'       => 'Nilai Catatan Academic',
            'add'         => 'Tambah Nilai',
            'edit'        => 'Edit Nilai Catatan Academik',
            'rombel'      => $this->WaliKelas_Model->allData(),
            'detail'      => $this->WaliKelas_Model->detail($id_rombel),
            'dataKelas'   => $this->WaliKelas_Model->dataKelas($id_rombel),
            'jml_siswa'   => $this->WaliKelas_Model->jml_siswa($id_rombel),
            'ta_aktif'    => $this->Model_Tahun->ta_aktif(),
            'jurusan'     => $this->Model_Rombel->detail($id_rombel),
            'tahun'       => $this->Model_Rombel->allData(),
        ];
        return render('walikelas/nilai/catatan_academic', $data);
    }

    //-------------------------------------------------
    public function add()
    {
        $data = [
            'c_academik'    => $this->request->getVar('c_academik'),
        ];
        $this->C_Academic_Model->add($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('walikelas/c_academic/catatan_academic/' . session()->get('rombel')));
    }
    //-------------------------------------------------
    public function edit($id_anggota_rombel)
    {
        $data = [
            'id_anggota_rombel'   => $id_anggota_rombel,
            'c_academik'          => $this->request->getVar('c_academik'),
        ];
        $this->C_Academic_Model->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('walikelas/c_academic/catatan_academic/' . session()->get('rombel')));
    }
}
