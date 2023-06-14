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
            'kelas' => $row[3],
            'tugasQuiz' => $row[4],
            'uts' => $row[5],
            'uas' => $row[6],
            'nilai' => $row[7],
            'nilaiAngka' => $row[8],
            'nilaiHuruf' => $row[9],
            'keterangan' => $row[10],
            'namaMK' => $row[11],
            'kehadiran' => $row[12],
            'statusPembayaran' => $row[13],
            'tunggakan' => $row[14],
        ]);
    }
}
