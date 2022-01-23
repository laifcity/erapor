<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_WaliKelas extends Model
{
    public function allData()
    {
        return $this->db->table('walikelas')
            ->join('tahun', 'tahun.id_tahun = walikelas.id_tahun', 'left')
            ->join('kelas', 'kelas.id_kelas = walikelas.id_kelas', 'left')
            ->join('ptk', 'ptk.id_ptk = walikelas.id_ptk', 'left')
            ->orderBy('id_walikelas', 'DESC')
            ->get()->getResultArray();
    }

    // public function detail($id_kelas)
    // {
    //     return $this->db->table('kelas')
    //         ->join('keahlian', 'keahlian.id_keahlian = kelas.id_keahlian', 'left')
    //         ->join('ptk', 'ptk.id_ptk = kelas.id_ptk', 'left')
    //         ->where('id_kelas', $id_kelas)
    //         ->get()->getRowArray();
    // }

    // public function add($data)
    // {
    //     $this->db->table('kelas')->insert($data);
    // }

    // public function edit($data)
    // {
    //     $this->db->table('kelas')
    //         ->where('id_kelas', $data['id_kelas'])
    //         ->update($data);
    // }

    // public function deleteData($data)
    // {
    //     $this->db->table('kelas')
    //         ->where('id_kelas', $data['id_kelas'])
    //         ->delete($data);
    // }

    // //Menampilkan Siswa belum punya Kelas
    // public function siswa_tdk_ada_kls()
    // {
    //     return $this->db->table('siswa')
    //         // ->join('keahlian', 'keahlian.id_keahlian = kelas.id_keahlian', 'left')
    //         ->where('id_kelas', null)
    //         ->orderBy('id_siswa', 'DESC')
    //         ->get()->getResultArray();
    // }

    // //Menampilkan Siswa berdasarkan Kelas
    // public function siswa($id_kelas)
    // {
    //     return $this->db->table('siswa')
    //         // ->join('keahlian', 'keahlian.id_keahlian = kelas.id_keahlian', 'left')
    //         ->where('id_kelas', $id_kelas)
    //         ->orderBy('id_siswa', 'DESC')
    //         ->get()->getResultArray();
    // }

    // public function jml_siswa($id_kelas)
    // {
    //     return $this->db->table('siswa')
    //         ->where('id_kelas', $id_kelas)
    //         ->countAllResults();
    // }

    // public function edit_siswa($data)
    // {
    //     $this->db->table('siswa')
    //         ->where('id_siswa', $data['id_siswa'])
    //         ->update($data);
    // }
}
