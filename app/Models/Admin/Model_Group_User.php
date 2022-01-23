<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Group_User extends Model
{
    protected $table         = 'group_user';
    protected $primaryKey    = 'level';
    protected $returnType    = 'array';
    protected $allowedFields = ['level', 'nama_group'];
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

}
