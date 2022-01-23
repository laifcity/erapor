<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_WaliKelas;
use App\Models\Admin\Model_Kelas;
use App\Models\Admin\Model_Tahun;
use App\Models\Admin\Model_Guru;

class WaliKelas extends BaseController
{
    public function __construct()
    {
        $this->Model_WaliKelas = new Model_WaliKelas();
        $this->Model_Kelas = new Model_Kelas();
        $this->Model_Tahun = new Model_Tahun();
        $this->Model_Guru = new Model_Guru();
    }

    public function index()
    {
        $walikelas  = $this->Model_WaliKelas->allData();
        $kelas  = $this->Model_Kelas->allData();
        $tahun  = $this->Model_Tahun->allData();
        $guru  = $this->Model_Guru->allData();
        $data   = [
            'title'       => 'Kelas',
            'judul'       => 'Data Kelas',
            'add'         => 'Tambah Data Kelas',
            'edit'        => 'Edit Data Kelas',
            'delete'      => 'Delete Data Kelas',
            'walikelas'   => $walikelas,
            'kelas'       => $kelas,
            'tahun'       => $tahun,
            'guru'        => $guru,
        ];
        return render('admin/walikelas/index', $data);
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
