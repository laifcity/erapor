<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == '') {
        // if (session()->get('log') != true) {
            session()->setFlashdata('pesan', 'Anda Belum Login, Silahkan Login Dulu');
            return redirect()->to(base_url('auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == 1) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        // if (session()->get('level') == 1) {
        //     return redirect()->to(base_url('admin/dashboard'));
        // } elseif (session()->get('level') == 2) {
        //     return redirect()->to(base_url('wali/dashboard'));
        // } elseif (session()->get('level') == 3) {
        //     return redirect()->to(base_url('guru/dashboard'));
        // }
    }
}
