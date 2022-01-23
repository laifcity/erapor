<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Jurusan extends Model
{
    public function allData()
    {
        return $this->db->table('keahlian')
            ->orderBy('id_keahlian', 'DESC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('keahlian')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('keahlian')
            ->where('id_keahlian', $data['id_keahlian'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('keahlian')
            ->where('id_keahlian', $data['id_keahlian'])
            ->delete($data);
    }
}
