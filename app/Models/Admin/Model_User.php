<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_User extends Model
{
    // protected $table         = 'user';
    // protected $primaryKey    = 'id_user';
    // protected $returnType    = 'array';
    // protected $allowedFields = ['id_ptk', 'username', 'password', 'level'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

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

    public function resetuser($id_user)
    {
        $this->db->table('user')
        ->where('id_user', $id_user)
        ->update(['password' => 123456]);
    }

    public function resetptk($id_ptk)
    {
        $this->db->table('ptk')
        ->where('id_ptk', $id_ptk)
        ->update(['password' => 123456]);
    }
    
    public function resetsiswa($id_siswa)
    {
        $this->db->table('siswa')
        ->where('id_siswa', $id_siswa)
        ->update(['password' => 123456]);
    }

    //Reset Password Wali Kelas
    public function resetwali($id_rombel)
    {
        $this->db->table('rombel')
        ->where('id_rombel', $id_rombel)
        ->update(['password' => 123456]);
    }
}
