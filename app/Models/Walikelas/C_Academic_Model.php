<?php

namespace App\Models\Walikelas;

use CodeIgniter\Model;

class C_Academic_Model extends Model
{
    public function allData()
    {
        return $this->db->table('n_c_academik')
            ->join('rombel', 'rombel.id_rombel = n_c_academik.id_rombel', 'left')
            ->join('siswa', 'siswa.id_siswa = n_c_academik.id_siswa', 'left')
            // ->join('kelas', 'kelas.id_kelas = n_c_academik.id_kelas', 'left')
            ->join('tahun', 'tahun.id_tahun = n_c_academik.id_tahun', 'left')
            ->orderBy('id_c_academik', 'DESC')
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
        $this->db->table('n_c_academik')
            ->where('id_c_academik', $data['id_c_academik'])
            ->delete($data);
    }
}
