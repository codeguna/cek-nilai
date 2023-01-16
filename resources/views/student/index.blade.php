@extends('layouts.admin')

@section('template_title')
    Student
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Student') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.students.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                                <button style="margin-right: 10px" type="button" class="btn btn-success btn-sm"
                                    data-toggle="modal" data-target="#importExcel">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @include('student.modal')
                    <div class="card-body">
                        <form action="" method="GET">
                            @csrf
                            <input type="text" class="form-control" name="cariNama" value="{{ old('cari') }}">
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Tugas/Quiz</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                        <th>Nilai</th>
                                        <th>Nilai Angka</th>
                                        <th>Nilai Huruf</th>
                                        <th>Ket.</th>
                                        <th>Namamk</th>
                                        <th>Kehadiran</th>
                                        <th>Pembayaran</th>
                                        <th>Tunggakan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($students as $student)
                                        @php
                                            $hasil_rupiah = 'Rp ' . number_format($student->tunggakan, 2, ',', '.');
                                        @endphp
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $student->nim }}</td>
                                            <td>{{ $student->nama }}</td>
                                            <td>{{ $student->tugasQuiz }}</td>
                                            <td>{{ $student->uts }}</td>
                                            <td>{{ $student->uas }}</td>
                                            <td>{{ $student->nilai }}</td>
                                            <td>{{ $student->nilaiAngka }}</td>
                                            <td>{{ $student->nilaiHuruf }}</td>
                                            <td>{{ $student->keterangan }}</td>
                                            <td>{{ $student->namaMK }}</td>
                                            <td>{{ $student->kehadiran }}</td>
                                            <td>

                                                @if ($student->statusPembayaran == 0)
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" class="btn btn-danger">Belum Lunas</button>
                                                @else
                                                    <button type="submit" class="btn btn-success">Sudah Lunas</button>
                                                @endif
                                            </td>
                                            <td>{{ $hasil_rupiah }}</td>
                                            <td>
                                                <form action="{{ route('admin.students.destroy', $student->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $students->links() !!}
            </div>
        </div>
    </div>
@endsection
