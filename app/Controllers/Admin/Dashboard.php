<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\Model_Dashboard;

class Dashboard extends BaseController
{

	protected $db, $Model_Dashboard;

	public function __construct()
	{
		$this->Model_Dashboard = new Model_Dashboard();
		// $this->ptkModel = new PtkModel();
	}

	public function index()
	{
		$data = [
			'title' 	=> 'Dashboard',
			// 'judul' 	=> 'Data PTK',
			'jml_ptk'   => $this->Model_Dashboard->jml_ptk(),
			'jml_siswa'   => $this->Model_Dashboard->jml_siswa(),
			'jml_rombel'   => $this->Model_Dashboard->jml_rombel(),
			'jml_jurusan'   => $this->Model_Dashboard->jml_jurusan(),
		];

		return render('admin/index', $data);
	}
}
