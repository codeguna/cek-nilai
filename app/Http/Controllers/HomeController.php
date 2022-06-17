<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('home');
    }
    public function search(Request $request)
    {

        $cari = $request->cari;
        $students  = Student::where('nim', '=', $cari)
            ->get();

        return view('student.result', compact('students'))->with('i');
    }
}
