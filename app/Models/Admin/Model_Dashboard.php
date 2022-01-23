<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Dashboard extends Model
{
    public function jml_ptk()
    {
        return $this->db->table('ptk')
            ->countAll();
    }

    public function jml_siswa()
    {
        return $this->db->table('siswa')
            ->countAll();
    }

    public function jml_rombel()
    {
        return $this->db->table('rombel')
            ->countAll();
    }

    public function jml_jurusan()
    {
        return $this->db->table('keahlian')
            ->countAll();
    }
}
