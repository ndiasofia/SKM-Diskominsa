<?php

namespace App\Middleware;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Middleware\Middleware;

class AuthMiddleware extends Middleware
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // // Periksa apakah pengguna sudah login
        // if (!session()->get('isLoggedIn')) {
        //     // Jika pengguna belum login, redirect ke halaman login
        //     return redirect()->to('/login');
        // }

        // Jika pengguna sudah login, lanjutkan ke halaman yang diminta
        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Lakukan sesuatu setelah eksekusi
    }
}
