<?php

namespace App\Models\Siswa;

use CodeIgniter\Model;

class Siswa_Model extends Model
{
    public function allData()
    {
        return $this->db->table('siswa')
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }
}
