<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Memuat layanan session
        $session = session();

        // Memeriksa apakah pengguna sudah login
        if (!$session->get('logged_in')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada logika khusus setelah request dalam contoh ini
    }
}
