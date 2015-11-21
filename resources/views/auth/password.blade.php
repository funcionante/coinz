@extends('box')

@section('title', 'Recuperar password')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">Email</label>
            <div class="col-md-7">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-7 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Recuperar password
                </button>
            </div>
        </div>
    </form>

@endsection