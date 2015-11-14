@extends('box')

@section('title', 'Alterar password')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label class="col-md-4 control-label">Email</label>
            <div class="col-md-7">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Password</label>
            <div class="col-md-7">
                <input type="password" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Confirmar Password</label>
            <div class="col-md-7">
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-7 col-md-offset-4">
                <button type="submit" class="btn btn-default">
                    Alterar password
                </button>
            </div>
        </div>
    </form>

@endsection