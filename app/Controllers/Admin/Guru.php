<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Guru;

class Guru extends BaseController
{
    protected $Model_Guru;

    public function __construct()
    {
        $this->Model_Guru = new Model_Guru();
    }

    public function index()
    {
        $ptk  = $this->Model_Guru->allData();
        $data = [
            'title' => 'PTK',
            'judul' => 'Data PTK',
            'ptk'   => $ptk
        ];

        return render('admin/guru/index', $data);
    }

    public function add()
    {
        // $ptk  = $this->Model_Guru->view($id_ptk);
        $data   = [
            'title'     => 'Tambah Data Guru',
            'judul'     => 'Data PTK',
        ];

        return render('admin/guru/form_add', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'niy'        => [
                'rules'  => 'required|is_unique[ptk.niy]',
                'errors' => [
                    'required'   => '{field} tidak boleh kosong',
                    'is_unique'  => '{field} sudah ada'
                ]
            ],
            'nama_ptk'       => [
                'rules'  => 'required[ptk.nama_ptk]',
                'errors' => [
                    'required'   => '{field} tidak boleh kosong',
                ]
            ],
            'jk'        => 'required',
            't_lahir'   => [
                'rules'  => 'required[ptk.t_lahir]',
                'errors' => [
                    'required'   => '{field} tidak boleh kosong',
                ]
            ],
            'tgl_lahir' => 'required',
            'alamat'     => [
                'rules'  => 'required[ptk.alamat]',
                'errors' => [
                    'required'   => '{field} tidak boleh kosong',
                ]
            ],
            'email'      => [
                'rules'  => 'required[ptk.email]',
                'errors' => [
                    'required'   => '{field} tidak boleh kosong',
                ]
            ],
            'password'      => [
                'rules'  => 'required[ptk.password]',
                'errors' => [
                    'required'   => '{field} tidak boleh kosong',
                ]
            ],
            'foto_ptk'    => [
                'label'  => 'foto_ptk',
                'rules'  => 'uploaded[foto_ptk]|max_size[foto_ptk,1024]|is_image[foto_ptk]|mime_in[ptk.foto_ptk,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded'  => 'Gambar belum dipilih',
                    'max_size'  => 'Gambar lebih dari 1 Mb',
                    'is_image'  => 'Fle bukan gambar',
                    'mime_in'   => 'File bukan gambar',
                ]
            ],
        ])) {
            // ambil gambar
            $foto = $this->request->getFile('foto_ptk');
            //ambil nama file
            $namaAvatar = $foto->getName();
            //jika valid
            $data = array(
                'niy' => $this->request->getGetPost('niy'),
                'nuptk' => $this->request->getGetPost('nuptk'),
                'nama_ptk' => $this->request->getGetPost('nama_ptk'),
                'jk' => $this->request->getGetPost('jk'),
                't_lahir' => $this->request->getGetPost('t_lahir'),
                'tgl_lahir' => $this->request->getGetPost('tgl_lahir'),
                'alamat' => $this->request->getGetPost('alamat'),
                'email' => $this->request->getGetPost('email'),
                'password' => $this->request->getGetPost('password'),
                'foto' => $namaAvatar,
            );
            //pindah gambar
            $foto->move('public/assets/foto/ptk', $namaAvatar);
            $this->Model_Guru->add($data);
            session()->setFlashData('success', 'data has been added to database');
            session()->setFlashdata('message', 'ditambah');
            return redirect()->to('/admin/guru');
        } else {
            session()->setFlashData('failed', \Config\Services::validation()->getErrors());
            return redirect()->to('/admin/guru/add');
        }
    }




    public function view($id_ptk)
    {
        // $ptk  = $this->Model_Guru->view($id_ptk);
        $data   = [
            'title'     => 'Profile',
            'judul'     => 'Data PTK',
            'ptk'       => $this->Model_Guru->allData(),
            'ptk'  => $this->Model_Guru->where('id_ptk', $id_ptk)->first()
        ];

        return render('admin/guru/view', $data);
    }

    // public function add_data()
    // {
    //     $data   = [
    //         'title'      => 'PTK',
    //         'judul'      => 'Form Tambah Data',
    //         'validation' => \Config\Services::validation()
    //     ];

    //     if ($this->request->getVar()) {
    //         $rules = [
    //             'niy'        => [
    //                 'rules'  => 'required|is_unique[ptk.niy]',
    //                 'errors' => [
    //                     'required'   => '{field} tidak boleh kosong',
    //                     'is_unique'  => '{field} sudah ada'
    //                 ]
    //             ],
    //             'nama_ptk'       => [
    //                 'rules'  => 'required[ptk.nama_ptk]',
    //                 'errors' => [
    //                     'required'   => '{field} tidak boleh kosong',
    //                 ]
    //             ],
    //             // 'jk'        => 'required',
    //             // 't_lahir'   => [
    //             //     'rules'  => 'required[ptk.t_lahir]',
    //             //     'errors' => [
    //             //         'required'   => '{field} tidak boleh kosong',
    //             //     ]
    //             // ],
    //             // 'tgl_lahir' => 'required',
    //             'alamat'     => [
    //                 'rules'  => 'required[ptk.alamat]',
    //                 'errors' => [
    //                     'required'   => '{field} tidak boleh kosong',
    //                 ]
    //             ],
    //             'email'      => [
    //                 'rules'  => 'required[ptk.email]',
    //                 'errors' => [
    //                     'required'   => '{field} tidak boleh kosong',
    //                 ]
    //             ],
    //             // 'foto_ptk'    => [
    //             //     'label'  => 'foto_ptk',
    //             //     'rules'  => 'uploaded[foto_ptk]|max_size[foto_ptk,1024]|is_image[foto_ptk]|mime_in[ptk.foto_ptk,image/jpg,image/jpeg,image/png]',
    //             //     'errors' => [
    //             //         'uploaded'  => 'Gambar belum dipilih',
    //             //         'max_size'  => 'Gambar lebih dari 1 Mb',
    //             //         'is_image'  => 'Fle bukan gambar',
    //             //         'mime_in'   => 'File bukan gambar',
    //             //     ]
    //             // ],

    //         ];

    //         //ambil gambar
    //         $foto_ptk = $this->request->getFile('foto_ptk');
    //         //ambil nama file
    //         $namaAvatar = $foto_ptk->getName();
    //         //pindah gambar
    //         $foto_ptk->move('public/assets/foto/ptk');

    //         if ($this->validate($rules)) {
    //             $inserted = [
    //                 'niy'       => $this->request->getVar('niy'),
    //                 'nuptk'     => $this->request->getVar('nuptk'),
    //                 'nama_ptk'  => $this->request->getVar('nama_ptk'),
    //                 'jk'        => $this->request->getVar('jk'),
    //                 't_lahir'   => $this->request->getVar('t_lahir'),
    //                 'tgl_lahir' => $this->request->getVar('tgl_lahir'),
    //                 'alamat'    => $this->request->getVar('alamat'),
    //                 'email'     => $this->request->getVar('email'),
    //                 'foto_ptk'   => $namaAvatar,
    //                 // 'foto_ptk' => $this->request->getFile('foto_ptk'),
    //             ];

    //             $this->Model_Guru->insert($inserted);
    //             // session()->setFlashData('success', 'data has been added to database');
    //             session()->setFlashdata('message', 'diubah');
    //             return redirect()->to('/admin/ptk');
    //         } else {
    //             session()->setFlashData('failed', \Config\Services::validation()->getErrors());
    //             return redirect()->back()->withInput();
    //         }
    //     }
    //     return render('admin/guru/form_add1', $data);
    // }

    // public function delete($id_ptk)
    // {
    //     $this->Model_Guru->delete($id_ptk);
    //     // session()->setFlashData('success', 'data has been deleted from database.');
    //     session()->setFlashdata('message', 'dihapus');
    //     return redirect()->to('/admin/ptk1');
    // }

    // public function update_data($id_ptk)
    // {
    //     $data = [
    //         'title' => 'Update Data',
    //         'judul' => 'Form Update',
    //         'dataById' => $this->Model_Guru->where('id_ptk', $id_ptk)->first()
    //     ];

    //     if ($this->request->getVar()) {
    //         $rules = [
    //             'niy'        => 'required',
    //             'nuptk'      => 'required',
    //             'nama_ptk'   => 'required',
    //             'jk'         => 'required',
    //             't_lahir'    => 'required',
    //             'tgl_lahir'  => 'required',
    //             'alamat'     => 'required',
    //             'email'      => 'required',
    //             // 'foto_ptk'    => 'required',
    //             // 'foto_ptk'    => [
    //             //     'label'  => 'foto_ptk',
    //             //     'rules'  => 'uploaded[foto_ptk]|max_size[foto_ptk,1024]|is_image[foto_ptk]|mime_in[foto_ptk,image/jpg,image/jpeg,image/png]',
    //             //     'rules'  => 'uploaded[ptk.foto_ptk]',
    //             //     'errors' => [
    //             //         'uploaded'  => 'Pilih Foto Dulu',
    //             //         'max_size'  => 'Gambar lebih dari 1 Mb',
    //             //         'is_image'  => 'Fle bukan gambar',
    //             //         'mime_in'   => 'File bukan gambar',
    //             //     ]
    //             // ],
    //         ];

    //         //ambil gambar
    //         $foto_ptk = $this->request->getFile('foto_ptk');
    //         //ambil nama file
    //         $namaAvatar = $foto_ptk->getName();
    //         //pindah gambar
    //         $foto_ptk->move('public/assets/foto/ptk');

    //         if ($this->validate($rules)) {
    //             $inserted = [
    //                 'niy'       => $this->request->getVar('niy'),
    //                 'nuptk'     => $this->request->getVar('nuptk'),
    //                 'nama_ptk'  => $this->request->getVar('nama_ptk'),
    //                 'jk'        => $this->request->getVar('jk'),
    //                 't_lahir'   => $this->request->getVar('t_lahir'),
    //                 'tgl_lahir' => $this->request->getVar('tgl_lahir'),
    //                 'alamat'    => $this->request->getVar('alamat'),
    //                 'email'     => $this->request->getVar('email'),
    //                 'foto_ptk'   => $namaAvatar,
    //                 // 'foto_ptk'   => $this->request->getVar('foto_ptk'),
    //             ];

    //             $this->Model_Guru->update($id_ptk, $inserted);
    //             // session()->setFlashData('success', 'data has been updated from database');
    //             session()->setFlashdata('message', 'diubah');
    //             return redirect()->to('/admin/ptk1');
    //         } else {
    //             session()->setFlashData('failed', \Config\Services::validation()->getErrors());
    //             return redirect()->back()->withInput();
    //         }
    //     }
    //     return render('admin/guru/form_update', $data);
    // }
}
