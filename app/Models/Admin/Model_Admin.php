<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Admin extends Model
{

    public function allData()
    {
        return $this->db->table('user')
            ->join('ptk', 'ptk.id_ptk=user.id_ptk')
            ->join('group_user', 'group_user.level=user.level')
            ->orderBy('ptk.id_ptk', 'ASC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }
}
