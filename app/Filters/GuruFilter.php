<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class GuruFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('level') == '') {
            // if (session()->get('log') != true) {
            session()->setFlashdata('pesan', 'Anda Belum Login, Silahkan Login Dulu');
            return redirect()->to(base_url('auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == 3) {
            // if (session()->get('log') == true) {
            return redirect()->to(base_url('guru/dashboard'));
        }
    }
}
