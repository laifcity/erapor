<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Siswa1;
use App\Models\Admin\Model_Jurusan;
use App\Models\Admin\Model_Kelas;

class Siswa1 extends BaseController
{
    protected $Model_Siswa1, $Model_Jurusan, $Model_Kelas;

    public function __construct()
    {
        $this->Model_Siswa1 = new Model_Siswa1();
        $this->Model_Jurusan = new Model_Jurusan();
        $this->Model_Kelas = new Model_Kelas();
    }

    public function index()
    {
        // $siswa  = $this->Model_Siswa1->allData();
        $data = [
            'title' => 'Siswa',
            'judul' => 'Data Siswa',
            'siswa'   => $this->Model_Siswa1->getSiswa(),
            'jurusan'   => $this->Model_Jurusan->allData(),
            'kelas'   => $this->Model_Kelas->allData(),
        ];

        return render('admin/siswa/index', $data);
    }

    public function view($id_siswa)
    {
        $data   = [
            'title'     => 'Profile',
            'judul'     => 'Data Siswa',
            'dataById'  => $this->Model_Siswa1->where('id_siswa', $id_siswa)->first()
        ];

        return render('admin/siswa/view', $data);
    }

    public function add()
    {
        $data   = [
            'title'     => 'Siswa',
            'judul'     => 'Form Tambah Data',
            'siswa'   => $this->Model_Siswa1->getSiswa(),
            'jurusan'   => $this->Model_Jurusan->allData(),
            'kelas'     => $this->Model_Kelas->allData(),
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
                'tgl_lahir' => 'required',
                'alm_siswa'     => [
                    'rules'  => 'required[siswa.alm_siswa]',
                    'errors' => [
                        'required'   => '{field} tidak boleh kosong',
                    ]
                ],
                'alm_siswa'      => [
                    'rules'  => 'required[siswa.alm_siswa]',
                    'errors' => [
                        'required'   => '{field} tidak boleh kosong',
                    ]
                ],
                // 'foto_siswa'    => [
                //     'label'  => 'foto_siswa',
                //     'rules'  => 'uploaded[foto_siswa]|max_size[foto_siswa,1024]|is_image[foto_siswa]|mime_in[siswa.foto_siswa,image/jpg,image/jpeg,image/png]',
                //     'errors' => [
                //         'uploaded'  => 'Gambar belum dipilih',
                //         'max_size'  => 'Gambar lebih dari 1 Mb',
                //         'is_image'  => 'Fle bukan gambar',
                //         'mime_in'   => 'File bukan gambar',
                //     ]
                // ],

            ];

            //ambil gambar
            $foto_siswa = $this->request->getFile('foto_siswa');
            //ambil nama file
            $namaAvatar = $foto_siswa->getName();
            //pindah gambar
            $foto_siswa->move('public/assets/foto/siswa');

            if ($this->validate($rules)) {
                $inserted = [
                    'nis'           => $this->request->getVar('nis'),
                    'nisn'          => $this->request->getVar('nisn'),
                    'nama_siswa'    => $this->request->getVar('nama_siswa'),
                    'jk'            => $this->request->getVar('jk'),
                    't_lahir'       => $this->request->getVar('t_lahir'),
                    'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
                    'alm_siswa'     => $this->request->getVar('alm_siswa'),
                    'id_keahlian'   => $this->request->getVar('id_keahlian'),
                    'id_kelas'      => $this->request->getVar('id_kelas'),
                    'foto_siswa'    => $namaAvatar,
                    // 'foto_siswa' => $this->request->getFile('foto_siswa'),
                ];

                $this->Model_Siswa1->insert($inserted);
                // session()->setFlashData('success', 'data has been added to database');
                session()->setFlashdata('message', 'ditambah');
                return redirect()->to('/admin/siswa1');
            } else {
                session()->setFlashData('failed', \Config\Services::validation()->getErrors());
                return redirect()->back()->withInput();
            }
        }
        return render('admin/siswa/form_add', $data);
    }

    public function delete($id_siswa)
    {
        $this->Model_Siswa1->delete($id_siswa);
        // session()->setFlashData('success', 'data has been deleted from database.');
        session()->setFlashdata('message', 'dihapus');
        return redirect()->to('/admin/siswa');
    }

    public function update_data($id_siswa)
    {
        $data = [
            'title' => 'Update Data',
            'judul' => 'Form Update',
            'dataById' => $this->Model_Siswa1->where('id_siswa', $id_siswa)->first()
        ];

        if ($this->request->getVar()) {
            $rules = [
                'nis'        => 'required',
                'nuptk'      => 'required',
                'nama_siswa' => 'required',
                'jk'         => 'required',
                't_lahir'    => 'required',
                'tgl_lahir'  => 'required',
                'alm_siswa'  => 'required',
                // 'foto_siswa'    => 'required',
                // 'foto_siswa'    => [
                //     'label'  => 'foto_siswa',
                //     'rules'  => 'uploaded[foto_siswa]|max_size[foto_siswa,1024]|is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                //     'rules'  => 'uploaded[siswa.foto_siswa]',
                //     'errors' => [
                //         'uploaded'  => 'Pilih Foto Dulu',
                //         'max_size'  => 'Gambar lebih dari 1 Mb',
                //         'is_image'  => 'Fle bukan gambar',
                //         'mime_in'   => 'File bukan gambar',
                //     ]
                // ],
            ];

            //ambil gambar
            $foto_siswa = $this->request->getFile('foto_siswa');
            //ambil nama file
            $namaAvatar = $foto_siswa->getName();
            //pindah gambar
            $foto_siswa->move('public/assets/foto/siswa');

            if ($this->validate($rules)) {
                $inserted = [
                    'nis'           => $this->request->getVar('nis'),
                    'nisn'          => $this->request->getVar('nisn'),
                    'nama_siswa'    => $this->request->getVar('nama_siswa'),
                    'jk'            => $this->request->getVar('jk'),
                    't_lahir'       => $this->request->getVar('t_lahir'),
                    'tgl_lahir'     => $this->request->getVar('tgl_lahir'),
                    'alm_siswa'     => $this->request->getVar('alm_siswa'),
                    'agama'         => $this->request->getVar('agama'),
                    'st_keluarga'   => $this->request->getVar('st_keluarga'),
                    'anak_ke'       => $this->request->getVar('anak_ke'),
                    'tlp_siswa'     => $this->request->getVar('tlp_siswa'),
                    'skl_asal'      => $this->request->getVar('skl_asal'),
                    'id_kls'        => $this->request->getVar('id_kls'),
                    'thn_masuk'     => $this->request->getVar('thn_masuk'),
                    'dt_tgl'        => $this->request->getVar('dt_tgl'),
                    'nm_ayah'       => $this->request->getVar('nm_ayah'),
                    'nm_ibu'        => $this->request->getVar('nm_ibu'),
                    'alm_ortu'      => $this->request->getVar('alm_ortu'),
                    'tlp_ortu'      => $this->request->getVar('tlp_ortu'),
                    'pek_ayah'      => $this->request->getVar('pek_ayah'),
                    'pek_ibu'       => $this->request->getVar('pek_ibu'),
                    'nm_wali'       => $this->request->getVar('nm_wali'),
                    'alm_wali'      => $this->request->getVar('alm_wali'),
                    'tlp_wali'      => $this->request->getVar('tlp_wali'),
                    'pek_wali'      => $this->request->getVar('pek_wali'),
                    'foto_siswa'    => $namaAvatar,
                ];

                $this->Model_Siswa1->update($id_siswa, $inserted);
                // session()->setFlashData('success', 'data has been updated from database');
                session()->setFlashdata('message', 'diubah');
                return redirect()->to('/admin/siswa');
            } else {
                session()->setFlashData('failed', \Config\Services::validation()->getErrors());
                return redirect()->back()->withInput();
            }
        }
        return render('admin/siswa/form_update', $data);
    }
}
