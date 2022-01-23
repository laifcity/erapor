<?php

namespace App\Models\Walikelas;

use CodeIgniter\Model;

class WaliKelas_ModelRombel extends Model
{

    public function allData()
    {
        return $this->db->table('anggota_rombel')
            ->join('rombel', 'rombel.id_rombel = anggota_rombel.id_rombel', 'left')
            ->join('siswa', 'siswa.id_siswa = anggota_rombel.id_siswa', 'left')
            ->join('tahun', 'tahun.id_tahun = anggota_rombel.id_tahun', 'left')
            ->orderBy('id_anggota_rombel', 'DESC')
            ->get()->getResultArray();
    }
    public function add($data)
    {
        $this->db->table('anggota_rombel')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('anggota_rombel')
            ->where('id_anggota_rombel', $data['id_anggota_rombel'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('anggota_rombel')
            ->where('id_anggota_rombel', $data['id_anggota_rombel'])
            ->delete($data);
    }

    public function detail($data)
    {
        return $this->db->table('anggota_rombel')
            ->join('rombel', 'rombel.id_rombel = anggota_rombel.id_rombel', 'left')
            ->join('siswa', 'siswa.id_siswa = anggota_rombel.id_siswa', 'left')
            ->join('tahun', 'tahun.id_tahun = anggota_rombel.id_tahun', 'left')
            ->where('id_anggota_rombel', $data['id_anggota_rombel'])
            ->get()->getRowArray();
    }

    public function anggota_rombel($id_anggota_rombel)
    {
        return $this->db->table('anggota_rombel')
            ->join('rombel', 'rombel.id_rombel = anggota_rombel.id_rombel', 'left')
            ->join('siswa', 'siswa.id_siswa = anggota_rombel.id_siswa', 'left')
            ->join('tahun', 'tahun.id_tahun = anggota_rombel.id_tahun', 'left')
            ->where('id_anggota_rombel', $id_anggota_rombel)
            ->get()->getRowArray();
    }

    public function siswa($id_rombel)
    {
        return $this->db->table('anggota_rombel')
            // ->join('siswa', 'siswa.id_siswa = anggota_rombel.id_siswa', 'left')
            ->where('id_rombel', $id_rombel)
            ->orderBy('id_siswa', 'ASC')
            ->get()->getResultArray();
    }




















    // public function siswa($id_rombel)
    // {
    //     return $this->db->table('siswa')
    //         ->where('id_rombel', $id_rombel)
    //         ->orderBy('id_siswa', 'ASC')
    //         ->get()->getResultArray();
    // }


    // public function anggota_rombel($data)
    // {
    //     return $this->db->table('siswa')
    //         ->join('keahlian', 'keahlian.id_keahlian = siswa.id_keahlian', 'left')
    //         ->join('siswa', 'siswa.id_siswa = siswa.id_rombel', 'left')
    //         ->where('id_rombel', $data['id_rombel'])
    //         ->get()->getRowArray();
    // }
}
