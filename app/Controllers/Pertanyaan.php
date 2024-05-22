<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PertanyaanModel;

class Pertanyaan extends BaseController
{
    function __construct()
    {
        $this->pertanyaan = new PertanyaanModel();
    }

    public function index()
    {
        // if (session()->get('isLoggedIn')) {
        //     // Lakukan aksi tertentu karena pengguna sudah login
        //     $data = [
        //         'pertanyaan' => $this->pertanyaan->orderBy('no_pertanyaan')->findAll(),
        //     ];
        //     return view('pertanyaan', $data);
        // } else {
        //     // Redirect atau lakukan tindakan lain jika pengguna belum login
        //     return redirect()->to('/login');
        // }

        $data = [
            'pertanyaan' => $this->pertanyaan->orderBy('no_pertanyaan')->findAll(),
        ];
        return view('pertanyaan', $data);
    }

    public function addPertanyaan()
    {
        $data = [
            'pertanyaan' => $this->request->getVar('pertanyaan'),
            'no_pertanyaan' => $this->request->getVar('no_pertanyaan'),
        ];
        $this->pertanyaan->insert($data);
        return redirect()->to('/pertanyaan');
    }

    public function deletePertanyaan($id)
    {
        $this->pertanyaan->delete($id);
        return redirect()->to('/pertanyaan');
    }

    public function update($id_pertanyaan=null)
    {
        $data = [
            'pertanyaan' => $this->request->getPost('editPertanyaan'),
        ];
        $this->pertanyaan->update($id_pertanyaan, $data);
        return redirect()->to('/pertanyaan');
    }

}
