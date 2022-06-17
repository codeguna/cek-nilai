@extends('layouts.admin')

@section('template_title')
    {{ $student->name ?? 'Show Student' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Student</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.students.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nim:</strong>
                            {{ $student->nim }}
                        </div>
                        <div class="form-group">
                            <strong>Nama:</strong>
                            {{ $student->nama }}
                        </div>
                        <div class="form-group">
                            <strong>Tugas/Quiz:</strong>
                            {{ $student->tugasQuiz }}
                        </div>
                        <div class="form-group">
                            <strong>Uts:</strong>
                            {{ $student->uts }}
                        </div>
                        <div class="form-group">
                            <strong>Uas:</strong>
                            {{ $student->uas }}
                        </div>
                        <div class="form-group">
                            <strong>Nilai:</strong>
                            {{ $student->nilai }}
                        </div>
                        <div class="form-group">
                            <strong>Nilaiangka:</strong>
                            {{ $student->nilaiAngka }}
                        </div>
                        <div class="form-group">
                            <strong>Nilaihuruf:</strong>
                            {{ $student->nilaiHuruf }}
                        </div>
                        <div class="form-group">
                            <strong>Keterangan:</strong>
                            {{ $student->keterangan }}
                        </div>
                        <div class="form-group">
                            <strong>Namamk:</strong>
                            {{ $student->namaMK }}
                        </div>
                        <div class="form-group">
                            <strong>Kehadiran:</strong>
                            {{ $student->kehadiran }}
                        </div>
                        <div class="form-group">
                            <strong>Statuspembayaran:</strong>
                            {{ $student->statusPembayaran }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
