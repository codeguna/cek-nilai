@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        @if (\Session::has('message'))
                            <p class="alert alert-info">
                                {{ \Session::get('message') }}
                            </p>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <h1><i class="fa fa-print" aria-hidden="true"></i> Cetak Nilai</h1>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <input name="email" type="text"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus
                                    placeholder="Email" value="{{ old('email', null) }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input name="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                    placeholder="Password">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success w-100">
                                        <i class="fa fa-lock" aria-hidden="true"></i> Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
