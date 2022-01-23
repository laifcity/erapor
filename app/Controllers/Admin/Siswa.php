<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Siswa;
use App\Models\Admin\Model_Jurusan;
use App\Models\Admin\Model_Kelas;

class Siswa extends BaseController
{
    protected $Model_Siswa;

    public function __construct()
    {
        $this->Model_Siswa = new Model_Siswa();
        $this->Model_Jurusan = new Model_Jurusan();
        $this->Model_Kelas = new Model_Kelas();
    }

    public function index()
    {
        $data = [
            'title'     => 'Siswa',
            'judul'     => 'Data Siswa',
            'siswa'     => $this->Model_Siswa->allData(),
            'jurusan'   => $this->Model_Jurusan->allData(),
            'kelas'   => $this->Model_Kelas->allData(),
        ];

        return render('admin/siswa/index', $data);
    }

    public function add()
    {
        $data   = [
            'title'      => 'Tambah Siswa',
            'judul'      => 'Form Tambah Data',
            'jurusan'   => $this->Model_Jurusan->allData(),
            'kelas'   => $this->Model_Kelas->allData(),
            'validation' => \Config\Services::validation()
        ];

        if ($this->request->getVar()) {
            $rules = [
                'nis'        => [
                    'rules'  => 'required|is_unique[siswa.nis]',
                    'errors' => [
                        'required'   => '{field} tidak boleh kosong',
                        'is_unique'  => '{field} sudah ada'
                    ]
                ],
                'nama_siswa'       => [
                    'rules'  => 'required[siswa.nama_siswa]',
                    'errors' => [
                        'required'   => '{field} tidak boleh kosong',
                    ]
                ],
                'jk'       => [
                    'rules'  => 'required[siswa.jk]',
                    'errors' => [
                        'required'   => '{field} tidak boleh kosong',
                    ]
                ],
                't_lahir'   => [
                    'rules'  => 'required[siswa.t_lahir]',
                    'errors' => [
                        'required'   => '{field} tidak boleh kosong',
                    ]
                ],
                'tgl_lahir' => [
                    'rules'  => 'required[siswa.tgl_lahir]',
                    'errors' => [
                        'required'   => '{field} tidak boleh kosong',
                    ]
                ],
                // 'alm_siswa'      => [
                //     'rules'  => 'required[siswa.alm_siswa]',
                //     'errors' => [
                //         'required'   => '{field} tidak boleh kosong',
                //     ]
                // ],
                'foto_siswa'    => [
                    'label'  => 'foto_siswa',
                    'rules'  => 'uploaded[foto_siswa]|max_size[foto_siswa,1024]|is_image[foto_siswa]|mime_in[siswa.foto_siswa,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded'  => 'Gambar belum dipilih',
                        'max_size'  => 'Gambar lebih dari 1 Mb',
                        'is_image'  => 'Fle bukan gambar',
                        'mime_in'   => 'File bukan gambar',
                    ]
                ],

            ];

            //ambil gambar
            $fotoSiswa = $this->request->getFile('foto_siswa');
            //pindah gambar ke (public/assets/foto/siswa)
            $fotoSiswa->move('public/assets/foto/siswa');
            //ambil nama file
            $fotoSiswa = $fotoSiswa->getName();

            if ($this->validate($rules)) {
                $inserted = [
                    'nis'       => $this->request->getVar('nis'),
                    // 'nuptk'     => $this->request->getVar('nuptk'),
                    'nama_siswa'  => $this->request->getVar('nama_siswa'),
                    'jk'        => $this->request->getVar('jk'),
                    't_lahir'   => $this->request->getVar('t_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'alm_siswa'    => $this->request->getVar('alm_siswa'),
                    'id_keahlian'    => $this->request->getVar('id_keahlian'),
                    'foto_siswa'   => $fotoSiswa,
                    // 'foto_siswa' => $this->request->getFile('foto_siswa'),
                ];

                $this->Model_Siswa->insert($inserted);
                // session()->setFlashData('success', 'data has been added to database');
                session()->setFlashdata('message', 'ditambah');
                return redirect()->to('/admin/siswa');
            } else {
                session()->setFlashData('failed', \Config\Services::validation()->getErrors());
                return redirect()->back()->withInput();
            }
        }
        return render('admin/siswa/form_add', $data);
    }

   

}
