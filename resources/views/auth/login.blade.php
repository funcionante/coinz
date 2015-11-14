@extends('box')

@section('title', 'Iniciar sessão')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
            <div class="col-md-7 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Lembrar-me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-7 col-md-offset-4">
                <button type="submit" class="btn btn-default">Entrar</button>
            </div>
        </div>
    </form>

@endsection

@section('bottom')
    <a class="btn btn-default pull-right" href="{{ url('/password/email') }}"><span class="glyphicon glyphicon-question-sign"></span> Esqueceste-te da password?</a></p>
@endsection