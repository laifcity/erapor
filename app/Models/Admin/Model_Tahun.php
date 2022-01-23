<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Tahun extends Model
{
    public function allData()
    {
        return $this->db->table('tahun')
            ->orderBy('id_tahun', 'DESC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tahun')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tahun')
            ->where('id_tahun', $data['id_tahun'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tahun')
            ->where('id_tahun', $data['id_tahun'])
            ->delete($data);
    }

    public function reset_status_ta()
    {
        $this->db->table('tahun')->update(['status' => 0]);
    }

    public function ta_aktif()
    {
        return $this->db->table('tahun')
            ->where('status', 1)
            ->get()
            ->getRowArray();
    }
}
