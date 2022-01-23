<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Guru extends Model
{
    public function allData()
    {
        return $this->db->table('ptk')
            ->orderBy('id_ptk', 'DESC')
            ->get()->getResultArray();
    }

    public function detail($id_ptk)
    {
        return $this->db->table('ptk')
            ->orderBy('id_ptk', $id_ptk)
            ->get()->getRowArray();
    }

    public function view($id_ptk)
    {
        $this->db->table('ptk')
            ->where('id_ptk', $id_ptk)
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('ptk')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('ptk')
            ->where('id_ptk', $data['id_ptk'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('ptk')
            ->where('id_ptk', $data['id_ptk'])
            ->delete($data);
    }
}
