<?php

namespace App\Http\Controllers;

use App\Models\StudentPrint;
use Illuminate\Http\Request;

/**
 * Class StudentPrintController
 * @package App\Http\Controllers
 */
class StudentPrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentPrints = StudentPrint::paginate();

        return view('student-print.index', compact('studentPrints'))
            ->with('i', (request()->input('page', 1) - 1) * $studentPrints->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studentPrint = new StudentPrint();
        return view('student-print.create', compact('studentPrint'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(StudentPrint::$rules);

        $studentPrint = StudentPrint::create($request->all());

        return redirect()->route('student-prints.index')
            ->with('success', 'StudentPrint created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentPrint = StudentPrint::find($id);

        return view('student-print.show', compact('studentPrint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentPrint = StudentPrint::find($id);

        return view('student-print.edit', compact('studentPrint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  StudentPrint $studentPrint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentPrint $studentPrint)
    {
        request()->validate(StudentPrint::$rules);

        $studentPrint->update($request->all());

        return redirect()->route('student-prints.index')
            ->with('success', 'StudentPrint updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $studentPrint = StudentPrint::find($id)->delete();

        return redirect()->route('student-prints.index')
            ->with('success', 'StudentPrint deleted successfully');
    }
}
