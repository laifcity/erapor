<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Rombel;
use App\Models\Admin\Model_Kelas;
use App\Models\Admin\Model_Jurusan;
use App\Models\Admin\Model_Guru;

class Rombel extends BaseController
{
    public function __construct()
    {
        $this->Model_Rombel = new Model_Rombel();
        $this->Model_Kelas = new Model_Kelas();
        $this->Model_Jurusan = new Model_Jurusan();
        $this->Model_Guru = new Model_Guru();
    }

    public function index()
    {
        $rombel  = $this->Model_Rombel->allData();
        $kelas  = $this->Model_Kelas->allData();
        $jurusan  = $this->Model_Jurusan->allData();
        $guru  = $this->Model_Guru->allData();
        $data   = [
            'title'       => 'Kelas',
            'judul'       => 'Data Kelas',
            'add'         => 'Tambah Data Kelas',
            'edit'        => 'Edit Data Kelas',
            'delete'      => 'Delete Data Kelas',
            'rombel'      => $rombel,
            'kelas'       => $kelas,
            'jurusan'     => $jurusan,
            'guru'        => $guru,
        ];
        return render('admin/rombel/index', $data);
    }

    //-------------------------------------------------

    public function detail($id_kelas)
    {
        $mapelkelas  = $this->Model_Kelas->allData();
        $jurusan     = $this->Model_Jurusan->allData();
        $rombel      = $this->Model_Rombel->siswa($id_kelas);
        $kelas       = $this->Model_Kelas->allData();
        $mapel       = $this->Model_Mapel->allData();
        $guru        = $this->Model_Guru->allData();
        $detailkelas = $this->Model_Kelas->detail($id_kelas);
        $mapelkelas  = $this->Model_Mapel_Kelas->allDataMapel($id_kelas);
        $data   = [
            'title'       => 'Mapel Kelas',
            'judul'       => 'Data Mapel Kelas',
            'add'         => 'Tambah Data Mapel Kelas',
            'kelas'       => $kelas,
            'detailkelas' => $detailkelas,
            'rombel'      => $rombel,
            'mapelkelas'  => $mapelkelas,
            'guru'        => $guru,
            'mapel'       => $mapel,
            'jurusan'     => $jurusan,
        ];
        return render('admin/mapel/detail_mapel', $data);
    }


    //--------------------------------------------------

    public function add()
    {
        if ($this->validate([
            'tahun_angkatan' => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
            'id_keahlian' => [
                'label' => 'Kompetensi Keahlian',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
            'id_ptk' => [
                'label' => 'Wali Kelas',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
            'pass_word' => [
                'label' => 'Password',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
        ])) {
            //Jika Valid
            $data = [
                'tahun_angkatan' => $this->request->getVar('tahun_angkatan'),
                'id_kelas'       => $this->request->getVar('id_kelas'),
                'id_keahlian'    => $this->request->getVar('id_keahlian'),
                'id_ptk'         => $this->request->getVar('id_ptk'),
                'pass_word'       => $this->request->getVar('pass_word'),
            ];
            $this->Model_Rombel->add($data);
            session()->setFlashdata('message', 'ditambahkan');
            return redirect()->to(base_url('admin/rombel'));
        } else {
            session()->setFlashData('failed', \Config\Services::validation()->getErrors());
            return redirect()->to('/admin/rombel');
        }
    }

    //--------------------------------------------------

    public function edit($id_rombel)
    {
        if ($this->validate([
            'tahun_angkatan' => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
            'id_keahlian' => [
                'label' => 'Kompetensi Keahlian',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
            'id_ptk' => [
                'label' => 'Wali Kelas',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
            'pass_word' => [
                'label' => 'Password',
                'rules' => 'required',
                'error' => [
                    'required' => '{field} Tidak bolaeh kosong !'
                ]
            ],
        ])) {
            //Jika Valid
            $data = [
                'id_rombel'      => $id_rombel,
                'tahun_angkatan' => $this->request->getVar('tahun_angkatan'),
                'id_kelas'       => $this->request->getVar('id_kelas'),
                'id_keahlian'    => $this->request->getVar('id_keahlian'),
                'id_ptk'         => $this->request->getVar('id_ptk'),
                'pass_word'       => $this->request->getVar('pass_word'),
            ];
            $this->Model_Rombel->edit($data);
            session()->setFlashdata('message', 'diubah');
            return redirect()->to(base_url('admin/rombel'));
        } else {
            session()->setFlashData('failed', \Config\Services::validation()->getErrors());
            return redirect()->to('/admin/rombel');
        }
    }

    //--------------------------------------------------

    public function delete($id_rombel)
    {
        $data = [
            'id_rombel'   => $id_rombel,
        ];
        $this->Model_Rombel->deleteData($data);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to(base_url('admin/rombel'));
    }

    //--------------------------------------------------

    public function anggota_rombel($id_rombel)
    {
        $rombel  = $this->Model_Rombel->detail($id_rombel);
        $siswa  = $this->Model_Rombel->siswa($id_rombel);
        // $kelas      = $this->Model_Kelas->detail($id_kelas);
        // $walikelas  = $this->Model_Jurusan->allData();
        $siswa_tpk  = $this->Model_Rombel->siswa_tdk_ada_kls();
        $jml_siswa  = $this->Model_Rombel->jml_siswa($id_rombel);
        $data   = [
            'title'       => 'Data Kelas',
            'judul'       => 'Anggora Rombel',
            'add'         => 'Tambah Anggota Rombel',
            // 'kelas'      => $kelas,
            // 'walikelas'   => $walikelas,
            'rombel'       => $rombel,
            'siswa'       => $siswa,
            'siswa_tpk'   => $siswa_tpk,
            'jml_siswa'   => $jml_siswa,
        ];
        return render('admin/rombel/anggota_rombel', $data);
    }

    public function add_anggota_rombel($id_siswa, $id_rombel)
    {
        $data = [
            'id_siswa'   => $id_siswa,
            'id_rombel'   => $id_rombel,
        ];
        $this->Model_Rombel->edit_siswa($data);
        $this->WaliKelas_Model->edit_siswa($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('admin/rombel/anggota_rombel/' . $id_rombel));
    }

    public function delete_anggota_rombel($id_siswa, $id_rombel)
    {
        $data = [
            'id_siswa'   => $id_siswa,
            'id_rombel'   => null,
        ];
        $this->Model_Rombel->edit_siswa($data);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to(base_url('admin/rombel/anggota_rombel/' . $id_rombel));
    }
}
