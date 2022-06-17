<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentAdditional extends Controller
{
    public function search(Request $request)
    {
        $cari = $request->cariNama;
        $students = DB::table('students')
                    ->where('nama', 'like',"%".$cari."%")
                    ->paginate(10);
 
		return view('home',['students' => $students]);
    }
}
