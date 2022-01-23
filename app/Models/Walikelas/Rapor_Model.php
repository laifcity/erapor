<?php

namespace App\Models\Walikelas;

use CodeIgniter\Model;

class Rapor_Model extends Model
{
    public function dataSiswa($id_rombel)
    {
        return $this->db->table('anggota_rombel')
            // ->join('rombel', 'rombel.id_rombel = n_c_academik.id_rombel', 'left')
            ->join('siswa', 'siswa.id_siswa = anggota_rombel.id_siswa', 'left')
            // ->join('kelas', 'kelas.id_kelas = n_c_academik.id_kelas', 'left')
            // ->join('tahun', 'tahun.id_tahun = n_c_academik.id_tahun', 'left')
            ->where('id_anggota_rombel', $id_rombel)
            ->orderBy('id_anggota_rombel', 'DESC')
            ->get()->getRowArray();
    }
    public function add($data)
    {
        $this->db->table('n_pkl')->insert($data);
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
