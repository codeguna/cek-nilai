<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @property $id
 * @property $nim
 * @property $nama
 * @property $tugas/quiz
 * @property $uts
 * @property $uas
 * @property $nilai
 * @property $nilaiAngka
 * @property $nilaiHuruf
 * @property $keterangan
 * @property $namaMK
 * @property $kelas
 * @property $statusPembayaran
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Student extends Model
{

	static $rules = [
		'nim' 			=> 'required',
		'nama' 			=> 'required',
		'tugasQuiz' 	=> 'required',
		'uts' 			=> 'required',
		'uas' 			=> 'required',
		'nilai' 		=> 'required',
		'nilaiAngka' 	=> 'required',
		'nilaiHuruf' 	=> 'required',
		'keterangan' 	=> 'required',
		'namaMK' 		=> 'required',
		'kehadiran' 	=> 'required',
		'tunggakan' 	=> 'required',
		'kelas' 		=> 'required',
	];

	protected $perPage = 20;

	/**
	 * Attributes that should be mass-assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['nim', 'nama', 'tugasQuiz', 'uts', 'uas', 'nilai', 'nilaiAngka', 'nilaiHuruf', 'keterangan', 'namaMK', 'kehadiran', 'statusPembayaran', 'tunggakan', 'kelas'];
}
