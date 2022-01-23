<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Model_Siswa1 extends Model
{
    protected $table         = 'siswa';
    protected $primaryKey    = 'id_siswa';
    protected $allowedFields = [
        'nis',
        'nisn',
        'nama_siswa',
        'jk',
        't_lahir',
        'tgl_lahir',
        'agama',
        'st_keluarga',
        'anak_ke',
        'alm_siswa',
        'tlp_siswa',
        'skl_asal',
        'id_Keahlian',
        'id_kls',
        'dt_tgl',
        'nm_ayah',
        'nm_ibu',
        'alm_ortu',
        'tlp_ortu',
        'pek_ayah',
        'pek_ibu',
        'nm_wali',
        'alm_wali',
        'tlp_wali',
        'pek_wali',
        'foto_siswa',
    ];
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';

    public function allData()
    {
        return $this->db->table('siswa')
            ->join('keahlian', 'keahlian.id_keahlian = siswa.id_keahlian', 'left')
            ->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left')
            ->orderBy('id_siswa', 'ASC')
            ->get()->getResultArray();
    }

    public function getSiswa($nis = false)
    {
        return $this->db->table('siswa')
            ->join('keahlian', 'keahlian.id_keahlian = siswa.id_keahlian', 'left')
            ->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left')
            ->orderBy('id_siswa', 'ASC')
            ->get()->getResultArray();

        if ($nis == false) {
            return $this->findAll();
        }

        return $this->where(['nis' => $nis])->first();
    }
}
