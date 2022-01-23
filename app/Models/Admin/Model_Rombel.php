<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Rombel extends Model
{
    public function allData()
    {
        return $this->db->table('rombel')
            ->join('keahlian', 'keahlian.id_keahlian = rombel.id_keahlian', 'left')
            ->join('kelas', 'kelas.id_kelas = rombel.id_kelas', 'left')
            ->join('ptk', 'ptk.id_ptk = rombel.id_ptk', 'left')
            ->orderBy('id_rombel', 'DESC')
            ->get()->getResultArray();
    }

    public function detail($id_rombel)
    {
        return $this->db->table('rombel')
            ->join('keahlian', 'keahlian.id_keahlian = rombel.id_keahlian', 'left')
            ->join('kelas', 'kelas.id_kelas = rombel.id_kelas', 'left')
            ->join('ptk', 'ptk.id_ptk = rombel.id_ptk', 'left')
            ->where('id_rombel', $id_rombel)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('rombel')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('rombel')
            ->where('id_rombel', $data['id_rombel'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('rombel')
            ->where('id_rombel', $data['id_rombel'])
            ->delete($data);
    }

    //Menampilkan Siswa belum punya Kelas
    public function siswa_tdk_ada_kls()
    {
        return $this->db->table('siswa')
            // ->join('keahlian', 'keahlian.id_keahlian = kelas.id_keahlian', 'left')
            ->where('id_rombel', null)
            ->orderBy('id_siswa', 'DESC')
            ->get()->getResultArray();
    }

    //Menampilkan Siswa berdasarkan Kelas
    public function siswa($x)
    {
        return $this->db->table('siswa')
            // ->join('keahlian', 'keahlian.id_keahlian = kelas.id_keahlian', 'left')
            ->where('x', $x)
            ->orderBy('id_siswa', 'ASC')
            ->get()->getResultArray();
    }

    public function jml_siswa($id_rombel)
    {
        return $this->db->table('siswa')
            ->where('id_rombel', $id_rombel)
            ->countAllResults();
    }

    public function edit_siswa($data)
    {
        $this->db->table('siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }

    //Reset Password Wali Kelas
    public function resetwali($id_rombel)
    {
        $this->db->table('rombel')
            ->where('id_rombel', $id_rombel)
            ->update(['password' => 123456]);
    }
}
