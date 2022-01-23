<?php

namespace App\Models\Walikelas;

use CodeIgniter\Model;

class Eskul_Model extends Model
{
    public function allData()
    {
        return $this->db->table('n_eskul')
            ->join('tahun', 'tahun.id_tahun = n_eskul.id_tahun', 'left')
            ->join('rombel', 'rombel.id_rombel = n_eskul.id_rombel', 'left')
            ->join('siswa', 'siswa.id_siswa = n_eskul.id_siswa', 'left')
            ->orderBy('id_eskul', 'DESC')
            ->get()->getResultArray();
    }

    public function eskul()
    {
        return $this->db->table('eskul')
            ->orderBy('id_eskul', 'ASC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('eskul')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('n_eskul')
            ->where('id_eskul', $data['id_eskul'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('n_c_academik')
            ->where('id_c_academik', $data['id_c_academik'])
            ->delete($data);
    }
}
