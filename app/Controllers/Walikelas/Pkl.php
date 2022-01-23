<?php

namespace App\Controllers\Walikelas;

use App\Controllers\BaseController;
use App\Models\Walikelas\Pkl_Model;
use App\Models\Walikelas\C_Academic_Model;
use App\Models\Walikelas\WaliKelas_Model;

class Pkl extends BaseController
{
    public function __construct()
    {
        $this->Pkl_Model = new Pkl_Model();
        $this->C_Academic_Model = new C_Academic_Model();
        $this->WaliKelas_Model = new WaliKelas_Model();
    }

    public function catatan_pkl($id_rombel)
    {
        $data   = [
            'title'       => 'Praktik Kerja Lapangan ',
            'judul'       => 'Nilai Praktik Kerja Lapangan',
            'add'         => 'Tambah Nama DU/DI',
            'edit'        => 'Nilai Praktik Kerja Lapangan',
            'dudi'        => $this->Pkl_Model->allData(),
            'rombel'      => $this->WaliKelas_Model->allData(),
            'detail'      => $this->WaliKelas_Model->detail($id_rombel),
            'dataKelas'   => $this->WaliKelas_Model->dataKelas($id_rombel),
            'jml_siswa'   => $this->WaliKelas_Model->jml_siswa($id_rombel),
            'ta_aktif'    => $this->Model_Tahun->ta_aktif(),
            'jurusan'     => $this->Model_Rombel->detail($id_rombel),
            'tahun'       => $this->Model_Rombel->allData(),
        ];
        return render('walikelas/nilai/pkl', $data);
    }

    //-------------------------------------------------
    public function add()
    {
        $data = [
            'nama_dudi'   => $this->request->getVar('nama_dudi'),
            'temp_dudi'   => $this->request->getVar('temp_dudi'),
            'lama_pkl'    => $this->request->getVar('lama_pkl'),
            'ket_pkl'     => $this->request->getVar('ket_pkl'),
        ];
        $this->Pkl_Model->add($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('walikelas/pkl/catatan_pkl/' . session()->get('rombel')));
    }
    //-------------------------------------------------
    public function edit($id_anggota_rombel)
    {
        $data = [
            'id_anggota_rombel'   => $id_anggota_rombel,
            'id_pkl'          => $this->request->getVar('id_pkl'),
        ];
        $this->Pkl_Model->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('walikelas/pkl/catatan_pkl/' . session()->get('rombel')));
    }
}
