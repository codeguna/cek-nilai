@extends('layouts.app')

@section('template_title')
    {{ $studentPrint->name ?? 'Show Student Print' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Student Print</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('student-prints.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nim:</strong>
                            {{ $studentPrint->nim }}
                        </div>
                        <div class="form-group">
                            <strong>Is Printed:</strong>
                            {{ $studentPrint->is_printed }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
