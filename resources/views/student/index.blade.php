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
                                <a href="{{ route('admin.students.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                                <button style="margin-right: 10px" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importExcel">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nim</th>
										<th>Nama</th>
										<th>Tugas/Quiz</th>
										<th>Uts</th>
										<th>Uas</th>
										<th>Nilai</th>
										<th>Nilaiangka</th>
										<th>Nilaihuruf</th>
										<th>Keterangan</th>
										<th>Namamk</th>
										<th>Kelas</th>
										<th>Statuspembayaran</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
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
											<td>{{ $student->kelas }}</td>
											<td>{{ $student->statusPembayaran }}</td>

                                            <td>
                                                <form action="{{ route('admin.students.destroy',$student->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.students.show',$student->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.students.edit',$student->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
