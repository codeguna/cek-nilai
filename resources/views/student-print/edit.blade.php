@extends('layouts.app')

@section('template_title')
    Update Student Print
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Student Print</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('student-prints.update', $studentPrint->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('student-print.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
