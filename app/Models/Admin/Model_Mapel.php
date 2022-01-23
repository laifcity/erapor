<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Mapel extends Model
{
    public function allData()
    {
        return $this->db->table('mapel')
            ->orderBy('id_mapel', 'DESC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('mapel')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('mapel')
            ->where('id_mapel', $data['id_mapel'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('mapel')
            ->where('id_mapel', $data['id_mapel'])
            ->delete($data);
    }
}
