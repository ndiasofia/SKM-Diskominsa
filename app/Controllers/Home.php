<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\RespondenModel;
use App\Models\PieChartModel;
use App\Models\PenilaianModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function login(): string
    {
        return view('login');
    }

    function __construct()
    {
        $this->pertanyaan = new PertanyaanModel();
        $this->responden = new RespondenModel();
        $this->penilaian = new PenilaianModel();
        $this->user = new UserModel();
    }

    public function register(): string
    {
        return view('register');
    }

    //buat fungsi untuk daftar pengguna agar bisa login
    function addUser()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        // dd($data);
        $this->user->insert($data);
        return redirect()->to('/login');
    }

    // // Fungsi untuk melakukan proses login
    function loginAction()
    {
        // Memuat layanan session
        $session = session();

        // Memuat model UserModel
        $userModel = new UserModel();

        // Mengambil input dari form login
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Mencari pengguna berdasarkan username
        $user = $userModel->where('username', $username)->first();

        if ($user) {
            // Memverifikasi password
            if (password_verify($password, $user['password'])) {
                // Menyimpan data pengguna ke dalam session
                $sessionData = [
                    'user_id' => $user['id_user'],
                    'username' => $user['username'],
                    'logged_in' => true,
                ];
                $session->set($sessionData);

                return redirect()->to('/dashboard');
            } else {
                // Password salah
                $session->setFlashdata('error', 'Password salah');
                return redirect()->to('/login');
            }
        } else {
            // Username tidak ditemukan
            $session->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
        // return view('dashboard');
    }

    function logout()
    {
        // Memuat layanan session
        $session = session();

        // Menghapus semua data session
        $session->destroy();

        return redirect()->to('/login');
    }
}