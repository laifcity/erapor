<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{

	public function index()
	{
		$data['title'] = 'Dashboard';
		return render('guru/index', $data);
	}
	//--------------------------------------------//
}
