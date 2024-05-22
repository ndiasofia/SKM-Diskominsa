<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\RespondenModel;
use App\Models\PieChartModel;
use App\Models\PenilaianModel;
use App\Models\SaranModel;

class Dashboard extends BaseController
{
    function __construct()
    {
        $this->pertanyaan = new PertanyaanModel();
        $this->responden = new RespondenModel();
        $this->penilaian = new PenilaianModel();
        $this->saran = new SaranModel();
    }

    public function index(): string
    {
        $respondenData = $this->responden->findAll();
        $totalResponden = count($respondenData);

        $jumlahLakiLaki = 0;
        $jumlahPerempuan = 0;

        foreach ($respondenData as $responden) {
            if ($responden->jenis_kelamin == 'Laki-Laki') {
                $jumlahLakiLaki++;
            } else {
                $jumlahPerempuan++;
            }
        }

        $persentaseLakiLaki = round(($jumlahLakiLaki / $totalResponden) * 100);
        $persentasePerempuan = round(($jumlahPerempuan / $totalResponden) * 100);

        $pieChartModel = new PieChartModel();
        $pieChartData = $pieChartModel->getPieChartData($jumlahLakiLaki, $jumlahPerempuan);

        $penilaian = $this->penilaian->findAll();
        // Ambil array untuk menyimpan nilai
        $dataPenilaianPerResponden = [];

        // Looping untuk setiap responden
        foreach ($penilaian as $item) {
            $id_responden = $item['id_responden'];
            $no_pertanyaan = $item['no_pertanyaan'];
            $nilai = $item['nilai'];

            // Jika belum ada array untuk responden ini, buat array baru
            if (!isset($dataPenilaianPerResponden[$id_responden])) {
                $dataPenilaianPerResponden[$id_responden] = [
                    'id_responden' => $id_responden,
                ];
            }

            // Tambahkan nilai ke array responden
            $dataPenilaianPerResponden[$id_responden]["nilai_soal_$no_pertanyaan"] = $nilai;
        }

        $persentasePerSoal = [];
        for ($i = 1; $i <= 9; $i++) {
            // Hitung total nilai per soal
            $totalNilaiSoal = 0;
            foreach ($dataPenilaianPerResponden as $dataPenilaian) {
                $totalNilaiSoal += $dataPenilaian["nilai_soal_$i"];
            }
            // Hitung persentase per soal
            $persentaseSoal = ($totalNilaiSoal / (4 * $totalResponden)) * 100;
            $persentasePerSoal["Soal $i"] = $persentaseSoal;
        }

        // Buat array data yang sesuai dengan format yang diperlukan oleh Morris.Bar
        $dataBarChart = [];
        foreach ($persentasePerSoal as $soal => $persentase) {
            $dataBarChart[] = ['device' => $soal, 'geekbench' => $persentase];
        }

        // Hitung total IKM
        $nilai = [];
        foreach ($dataPenilaianPerResponden as $dataPenilaian) {
            for ($i = 1; $i <= 9; $i++) {
                $nilai[] = $dataPenilaian["nilai_soal_$i"];
            }
        }
        $totalIKM = count($nilai) > 0 ? round(array_sum($nilai) / count($nilai), 2) : 0;
        $hasilPenilaian = count($persentasePerSoal) > 0 ? round(array_sum($persentasePerSoal) / count($persentasePerSoal), 2) : 0;
        if ($hasilPenilaian < 25) {
            $label = 'Tidak Kompeten';
        } else if ($hasilPenilaian < 50) {
            $label = 'Kurang Kompeten';
        } else if ($hasilPenilaian < 75) {
            $label = 'Kompeten';
        } else {
            $label = 'Sangat Kompeten';
        }

        $data = [
            'jumlah_pertanyaan' => $this->pertanyaan->countAll(),
            'jumlah_responden' => $this->responden->countAll(),
            'penilaian' => $this->penilaian->findAll(),
            'persentase_laki_laki' => $persentaseLakiLaki,
            'persentase_perempuan' => $persentasePerempuan,
            'jumlah_laki_laki' => $jumlahLakiLaki,
            'jumlah_perempuan' => $jumlahPerempuan,
            'persentaseLakiLaki' => $persentaseLakiLaki, 
            'persentasePerempuan' => $persentasePerempuan,
            'dataPenilaianPerResponden' => $dataPenilaianPerResponden,
            'dataBarChart' => $dataBarChart,
            'persentasePerSoal' => $persentasePerSoal,
            'totalIKM' => $totalIKM,
            'hasilPenilaian' => $hasilPenilaian,
            'label' => $label,
            'saran' => $this->saran->findAll(),
            // 'nilaiRataRata' => $nilaiRataRata,               
            // 'penilaian' => $this->penilaian->findAll(),
        ];

        return view('dashboard', $data);
    }
}