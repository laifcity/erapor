<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Tahun;

class Dashboard extends BaseController
{

	public function __construct()
	{
		$this->Model_Tahun = new Model_Tahun();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		return view('Siswa/index', $data);
	}
	//--------------------------------------------//

	public function absensi()
	{

		$ta_aktif  = $this->Model_Tahun->ta_aktif();
		$data   = [
			'title'       => 'Tahun Pelajaran',
			'judul'       => 'Data Tahun Pelajaran',
			'add'         => 'Tambah Data Tahun Pelajaran',
			'edit'        => 'Edit Data Tahun Pelajaran',
			'delete'      => 'Delete Data Tahun Pelajaran',
			'ta_aktif'       => $ta_aktif,
		];
		return view('Siswa/absensi', $data);
	}
	//--------------------------------------------//
}
