<?php

namespace App\Controllers\Walikelas;

use App\Controllers\BaseController;
use App\Models\Walikelas\Eskul_Model;
use App\Models\Walikelas\C_Academic_Model;
use App\Models\Walikelas\WaliKelas_Model;

class Eskul extends BaseController
{
    public function __construct()
    {
        $this->Eskul_Model = new Eskul_Model();
        $this->C_Academic_Model = new C_Academic_Model();
        $this->WaliKelas_Model = new WaliKelas_Model();
    }

    public function n_eskul($id_rombel)
    {
        $data   = [
            'title'       => 'Ekstra Kurikuler ',
            'judul'       => 'Nilai Ekstra Kurikuler',
            'add'         => 'Tambah Ekstra Kurikuler',
            'edit'        => 'Nilai Ekstra Kurikuler',
            'dataeskul'   => $this->Eskul_Model->eskul(),
            'eskul'       => $this->Eskul_Model->allData(),
            'rombel'      => $this->WaliKelas_Model->allData(),
            'detail'      => $this->WaliKelas_Model->detail($id_rombel),
            'dataKelas'   => $this->WaliKelas_Model->dataKelas($id_rombel),
            'jml_siswa'   => $this->WaliKelas_Model->jml_siswa($id_rombel),
            'ta_aktif'    => $this->Model_Tahun->ta_aktif(),
            'jurusan'     => $this->Model_Rombel->detail($id_rombel),
            'tahun'       => $this->Model_Rombel->allData(),
        ];
        return render('walikelas/nilai/eskul', $data);
    }

    //-------------------------------------------------
    public function add()
    {
        $data = [
            'eskul'   => $this->request->getVar('eskul'),
            // 'temp_dudi'   => $this->request->getVar('temp_dudi'),
            // 'lama_pkl'    => $this->request->getVar('lama_pkl'),
            // 'ket_pkl'     => $this->request->getVar('ket_pkl'),
        ];
        $this->Eskul_Model->add($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('walikelas/eskul/n_eskul/' . session()->get('rombel')));
    }
    //-------------------------------------------------
    public function edit($id_anggota_rombel)
    {
        $data = [
            'id_anggota_rombel'   => $id_anggota_rombel,
            'id_eskul'          => $this->request->getVar('id_eskul'),
        ];
        $this->Eskul_Model->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('walikelas/eskul/n_eskul/' . session()->get('rombel')));
    }
}
