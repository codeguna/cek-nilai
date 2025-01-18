<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Student;
use App\Models\StudentPrint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Builder\Stub;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::groupBy('nama', 'nim','is_printed')->select('nim', 'nama','is_printed')->get();
        $printed = StudentPrint::where('is_printed', '=', 1)->count();
        return view('home', compact('students','printed'));
    }
    public function search(Request $request)
    {
        $cari       = $request->cari;
        $getNama    = $request->nama;

        $students   = Student::where('nim', '=', $cari)->orderBy('namaMK', 'ASC')->get();
        $countMK    = Student::select('namaMK')->where('nama', '=', $getNama)->count();
        $sumUTS     = Student::select('uts')->where('nama', '=', $getNama)->sum('uts');
        $getIP      = $sumUTS / $countMK;

        $updateStudents = Student::where('nim', '=', $cari)->first();
        // Assuming $cari is an array of 'nim' values
        $updateStudents = StudentPrint::where('nim', $updateStudents->nim)->create([
            'is_printed' => 1,
            'nim' => $updateStudents->nim,
            'created_at' => now()
        ]);
        
        return view('student.result', compact('students', 'countMK', 'getIP'))->with('i');
    }
}
