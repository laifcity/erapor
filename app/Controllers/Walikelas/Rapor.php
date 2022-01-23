<?php

namespace App\Controllers\Walikelas;

use App\Controllers\BaseController;
use App\Models\Walikelas\Rapor_Model;
use App\Models\Walikelas\WaliKelas_Model;

class Rapor extends BaseController
{

    public function __construct()
    {
        $this->WaliKelas_Model = new WaliKelas_Model();
        $this->Rapor_Model = new Rapor_Model();
    }

    public function raporSiswa($id_rombel)
    {
        $data   = [
            'title'       => 'Data Kelas',
            'judul'       => 'Anggota Rombel',
            'add'         => 'Tambah Anggota Rombel',
            'rombel'      => $this->WaliKelas_Model->allData(),
            'detail'      => $this->WaliKelas_Model->detail($id_rombel),
            'dataKelas'   => $this->WaliKelas_Model->dataKelas($id_rombel),
            'jml_siswa'   => $this->WaliKelas_Model->jml_siswa($id_rombel),
            'ta_aktif'    => $this->Model_Tahun->ta_aktif(),
            // 'siswa'       => $this->Model_Siswa->allData(),
            'jurusan'     => $this->Model_Rombel->detail($id_rombel),
            'tahun'       => $this->Model_Rombel->allData(),
            // 'siswa'       => $this->WaliKelas_ModelRombel->siswa($id_rombel),
        ];
        return render('walikelas/nilai/rapor', $data);
    }

    public function dataSiswa($id_rombel)
    {
        $data   = [
            'title'      => 'Data Kelas',
            'judul'      => 'KETERANGAN TENTANG DIRI PESERTA DIDIK',
            'siswa'      => $this->Rapor_Model->dataSiswa($id_rombel),
        ];
        return render('walikelas/nilai/detail_rapor', $data);
    }
}
