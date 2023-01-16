<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'nim' => $row[1],
            'nama' => $row[2],
            'tugasQuiz' => $row[3],
            'uts' => $row[4],
            'uas' => $row[5],
            'nilai' => $row[6],
            'nilaiAngka' => $row[7],
            'nilaiHuruf' => $row[8],
            'keterangan' => $row[9],
            'namaMK' => $row[10],
            'kehadiran' => $row[11],
            'statusPembayaran' => $row[12],
            'tunggakan' => $row[13],
        ]);
    }
}
