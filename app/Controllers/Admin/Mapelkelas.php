<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Mapel_Kelas;
use App\Models\Admin\Model_Mapel;
use App\Models\Admin\Model_Kelas;
use App\Models\Admin\Model_Rombel;
use App\Models\Admin\Model_Guru;

class Mapelkelas extends BaseController
{
    protected $Model_Mapel_Kelas, $Model_Mape, $Model_Kelas, $Model_Guru;

    public function __construct()
    {
        $this->Model_Mapel_Kelas = new Model_Mapel_Kelas();
        $this->Model_Mapel       = new Model_Mapel();
        $this->Model_Kelas       = new Model_Kelas();
        $this->Model_Guru        = new Model_Guru();
        $this->Model_Rombel      = new Model_Rombel();
    }

    public function index()
    {
        $mapelkelas      = $this->Model_Mapel_Kelas->allData();
        $mapel      = $this->Model_Mapel->allData();
        $kelas      = $this->Model_Kelas->allData();
        $data   = [
            'title'       => 'Mapel Kelas',
            'judul'       => 'Data Mapel Kelas',
            'mapelkelas'  => $mapelkelas,
            'mapel'       => $mapel,
            'kelas'       => $kelas,
        ];
        return render('admin/mapel/v_mapelkelas', $data);
    }

    //--------------------------------------------------

    public function detail($id_kelas)
    {
        $mapelkelas = $this->Model_Kelas->allData();
        $rombel     = $this->Model_Rombel->allData();
        $kelas      = $this->Model_Kelas->allData();
        $mapel      = $this->Model_Mapel->allData();
        $guru       = $this->Model_Guru->allData();
        $detailkelas      = $this->Model_Kelas->detail($id_kelas);
        $mapelkelas = $this->Model_Mapel_Kelas->allDataMapel($id_kelas);
        $data   = [
            'title'      => 'Mapel Kelas',
            'judul'      => 'Data Mapel Kelas',
            'add'        => 'Tambah Data Mapel Kelas',
            'kelas'      => $kelas,
            'detailkelas' => $detailkelas,
            'rombel'     => $rombel,
            'mapelkelas' => $mapelkelas,
            'guru'       => $guru,
            'mapel'       => $mapel,
        ];
        return render('admin/mapel/detail_mapel', $data);
    }

    //--------------------------------------------------

    public function add($id_kelas)
    {
        if ($this->validate([
            // 'id_kelas' => [
            //     'label' => 'Kelas',
            //     'rules' => 'required',
            //     'error' => [
            //         'required' => '{field} Tidak bolaeh kosong !'
            //     ]
            // ],
            'id_mapel' => [
                'label' => 'Mata Pelajaran',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
            'id_ptk' => [
                'label' => 'Guru Mapel',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
        ])) {
            //Jika Valid
            $data = [
                'id_kelas'   => $id_kelas,
                'id_mapel'   => $this->request->getVar('id_mapel'),
                'id_ptk'     => $this->request->getVar('id_ptk'),
            ];
            $this->Model_Mapel_Kelas->add($data);
            session()->setFlashdata('message', 'ditambahkan');
            return redirect()->to(base_url('admin/mapelkelas/detail/' . $id_kelas));
        } else {
            //Jika tidak Valid
            session()->setFlashData('failed', \Config\Services::validation()->getErrors());
            return redirect()->to('/admin/mapelkelas/detail/' . $id_kelas);
        }
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
