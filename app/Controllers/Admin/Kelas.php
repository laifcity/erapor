<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Kelas;
use App\Models\Admin\Model_Jurusan;

class Kelas extends BaseController
{
    protected $Model_Mapel, $Model_Jurusan;
    public function __construct()
    {

        $this->Model_Jurusan = new Model_Jurusan();
        $this->Model_Kelas = new Model_Kelas();
    }

    public function index()
    {
        $kelas  = $this->Model_Kelas->allData();
        $jurusan  = $this->Model_Jurusan->allData();
        $data   = [
            'title'       => 'Kelas',
            'judul'       => 'Data Kelas',
            'add'         => 'Tambah Data Kelas',
            'edit'        => 'Edit Data Kelas',
            'delete'      => 'Delete Data Kelas',
            'kelas'       => $kelas,
            'jurusan'     => $jurusan,
        ];
        return render('admin/kelas/index', $data);
    }

    //--------------------------------------------------

    public function add()
    {
        $data = [
            'nama_kelas'    => $this->request->getVar('nama_kelas'),
            'kode_kelas'    => $this->request->getVar('kode_kelas'),
            'id_keahlian'   => $this->request->getVar('id_keahlian'),
        ];
        $this->Model_Kelas->add($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('admin/kelas'));
    }

    //--------------------------------------------------

    public function edit($id_kelas)
    {
        $data = [
            'id_kelas'      => $id_kelas,
            'nama_kelas'    => $this->request->getVar('nama_kelas'),
            'kode_kelas'    => $this->request->getVar('kode_kelas'),
            'id_keahlian'   => $this->request->getVar('id_keahlian'),
        ];
        $this->Model_Kelas->edit($data);
        session()->setFlashdata('message', 'diubah');
        return redirect()->to(base_url('admin/kelas'));
    }

    //--------------------------------------------------

    public function delete($id_kelas)
    {
        $data = [
            'id_kelas'   => $id_kelas,
        ];
        $this->Model_Kelas->deleteData($data);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to(base_url('admin/kelas'));
    }

    //--------------------------------------------------

    public function anggota_rombel($id_kelas)
    {
        $kelas  = $this->Model_Kelas->detail($id_kelas);
        $siswa  = $this->Model_Kelas->siswa($id_kelas);
        $siswa_tpk  = $this->Model_Kelas->siswa_tdk_ada_kls();
        $jml_siswa  = $this->Model_Kelas->jml_siswa($id_kelas);
        $data   = [
            'title'       => 'Data Kelas',
            'judul'       => 'Anggora Rombel',
            'add'         => 'Tambah Anggota Rombel',
            'kelas'       => $kelas,
            'siswa'       => $siswa,
            'siswa_tpk'   => $siswa_tpk,
            'jml_siswa'   => $jml_siswa,
        ];
        return render('admin/kelas/anggota_rombel', $data);
    }

    public function add_anggota_rombel($id_siswa, $id_kelas)
    {
        $data = [
            'id_siswa'   => $id_siswa,
            'id_kelas'   => $id_kelas,
        ];
        $this->Model_Kelas->edit_siswa($data);
        session()->setFlashdata('message', 'ditambahkan');
        return redirect()->to(base_url('admin/kelas/anggota_rombel/' . $id_kelas));
    }

    public function delete_anggota_rombel($id_siswa, $id_kelas)
    {
        $data = [
            'id_siswa'   => $id_siswa,
            'id_kelas'   => null,
        ];
        $this->Model_Kelas->edit_siswa($data);
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to(base_url('admin/kelas/anggota_rombel/' . $id_kelas));
    }
}
