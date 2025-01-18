@extends('layouts.app')

@section('template_title')
    Student Print
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Student Print') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('student-prints.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nim</th>
										<th>Is Printed</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentPrints as $studentPrint)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $studentPrint->nim }}</td>
											<td>{{ $studentPrint->is_printed }}</td>

                                            <td>
                                                <form action="{{ route('student-prints.destroy',$studentPrint->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('student-prints.show',$studentPrint->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('student-prints.edit',$studentPrint->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $studentPrints->links() !!}
            </div>
        </div>
    </div>
@endsection
