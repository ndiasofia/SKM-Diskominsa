<?php

namespace App\Models;

use CodeIgniter\Model;

class PieChartModel extends Model
{
    public function getPieChartData($jumlahLakiLaki, $jumlahPerempuan)
    {
        // Hitung persentase laki-laki dan perempuan
        $total = $jumlahLakiLaki + $jumlahPerempuan;
        $persentaseLakiLaki = round(($jumlahLakiLaki / $total) * 100);
        $persentasePerempuan = round(($jumlahPerempuan / $total) * 100);

        // Buat array data untuk diagram pie chart
        $pieChartData = [
            [
                'label' => 'Laki-Laki',
                'value' => $persentaseLakiLaki
            ],
            [
                'label' => 'Perempuan',
                'value' => $persentasePerempuan
            ]
        ];

        return $pieChartData;
    }
}
