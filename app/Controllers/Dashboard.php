<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (session()->get('level') == 1) {
            return redirect()->to(base_url('admin/dashboard'));
        } elseif (session()->get('level') == 2) {
            return redirect()->to(base_url('wali/dashboard'));
        } elseif (session()->get('level') == 3) {
            return redirect()->to(base_url('guru/dashboard'));
        }
    }
}
