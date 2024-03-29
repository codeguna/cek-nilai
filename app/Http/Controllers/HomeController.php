<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Student;
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
        $students = Student::groupBy('nama', 'nim')->select('nim', 'nama')->get();
        return view('home', compact('students'));
    }
    public function search(Request $request)
    {
        $cari = $request->cari;
        $getNama = $request->nama;

        $students  = Student::where('nim', '=', $cari)->orderBy('namaMK', 'ASC')->get();
        $countMK = Student::select('namaMK')->where('nama', '=', $getNama)->count();
        $sumUTS = Student::select('uts')->where('nama', '=', $getNama)->sum('uts');
        $getIP = $sumUTS / $countMK;

        return view('student.result', compact('students', 'countMK', 'getIP'))->with('i');
    }
}
