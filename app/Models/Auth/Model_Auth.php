<?php

namespace App\Models\Auth;

use CodeIgniter\Model;

class Model_Auth extends Model
{
    public function login_user($username, $password)
    {
        return $this->db->table('user')->where([
            'username'  => $username,
            'password'  => $password
        ])->get()->getRowArray();
    }

    public function login_ptk($username, $password)
    {
        return $this->db->table('ptk')->where([
            'niy'      => $username,
            'password'  => $password
        ])->get()->getRowArray();
    }

    public function login_wali($username, $password)
    {
        return $this->db->table('rombel')
            ->join('ptk', 'ptk.id_ptk = rombel.id_ptk', 'left')
            ->join('keahlian', 'keahlian.id_keahlian = rombel.id_keahlian', 'left')
            ->join('kelas', 'kelas.id_kelas = rombel.id_kelas', 'left')
            ->where([
                'niy'      => $username,
                'pass_word'  => $password,
            ])->get()->getRowArray();
    }

    public function login_siswa($username, $password)
    {
        return $this->db->table('siswa')->where([
            'nisn'      => $username,
            'password' => $password
        ])->get()->getRowArray();
    }

    public function ta_aktif()
    {
        return $this->db->table('tahun')
            ->where('status', 1)
            ->get()
            ->getRowArray();
    }
}
