<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RespondenModel;
use App\Models\PertanyaanModel;
use App\Models\SaranModel;
use App\Models\PenilaianModel;

class Survei extends BaseController {
    public function __construct()
    {
        $this->responden = new RespondenModel();
        $this->pertanyaan = new PertanyaanModel();
        $this->saran = new SaranModel();
        $this->jawaban = new PenilaianModel();
    }

    public function index(): string
    {
        $data['pertanyaan'] = $this->pertanyaan->findAll();
    
        // Misalnya, ambil pertanyaan dengan ID tertentu (ganti dengan ID yang sesuai)
        $id_pertanyaan = 1;
        $data['singlePertanyaan'] = $this->pertanyaan->find($id_pertanyaan);
    
        return view('survei', $data);
    }

public function save() { 
        
    // Ambil data dari formulir
    $usia = $this->request->getPost('usia');
    $jenis_kelamin = $this->request->getPost('jenis_kelamin');
    $pekerjaan = $this->request->getPost('pekerjaan');
    $saran = $this->request->getPost('saran');
    $pertanyaan = $this->request->getPost('pertanyaan'); // Array pertanyaan
    $penilaian = $this->request->getPost('penilaian'); // Array penilaian

    // Simpan data responden
    $respondenData = [
        'usia' => $usia,
        'jenis_kelamin' => $jenis_kelamin,
        'pekerjaan' => $pekerjaan
    ];
    $respondenId = $this->responden->insert($respondenData);

    // Simpan jawaban
    foreach ($penilaian as $no_pertanyaan => $nilai) {
        // Ambil nilai id_pertanyaan berdasarkan no_pertanyaan dari array pertanyaan
        $id_pertanyaan = array_search($no_pertanyaan, array_column($pertanyaan, 'pertanyaan'));

        $jawabanData = [
            'id_responden' => $respondenId,
            'id_pertanyaan' => $id_pertanyaan,
            'no_pertanyaan' => $no_pertanyaan,
            'nilai' => $nilai
        ];
        $this->jawaban->insert($jawabanData);
    }

    // Simpan saran
    $saranData = [
        'id_responden' => $respondenId,
        'saran' => $saran
    ];
    $this->saran->insert($saranData);

    // Redirect dengan pesan sukses menggunakan SweetAlert
    return redirect()->to('survei')->with('success', 'Data survei berhasil disimpan');
}

}