<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Siswa extends Model
{
    public function allData()
    {
        return $this->db->table('siswa')
            ->join('keahlian', 'keahlian.id_keahlian = siswa.id_keahlian', 'left')
            ->join('rombel', 'rombel.id_rombel = siswa.id_rombel', 'left')
            ->orderBy('id_siswa', 'ASC')
            ->get()->getResultArray();
    }

    public function detail($id_siswa)
    {
        return $this->db->table('siswa')
            ->join('keahlian', 'keahlian.id_keahlian = siswa.id_keahlian', 'left')
            ->join('siswa', 'siswa.id_siswa = siswa.id_siswa', 'left')
            ->where('id_siswa', $id_siswa)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('siswa')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->delete($data);
    }

    //Menampilkan siswa berdasarkan Jurusan
    public function dataJurusan($id_keahlian)
    {
        return $this->db->table('siswa')
            ->join('keahlian', 'keahlian.id_keahlian = siswa.id_keahlian', 'left')
            // ->join('rombel', 'rombel.id_rombel = siswa.id_rombel', 'left')
            ->where('id_keahlian', $id_keahlian)
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }
}
