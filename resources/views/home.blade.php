@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="GET">
                            <label class="form-group">Cek NRP</label>
                            <input class="form-control" type="text" name="search" placeholder="Input NRP disini ..."
                                required>
                            <button style="margin-top: 10px" class="btn btn-warning"><i class="fas fa-search"></i> Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
