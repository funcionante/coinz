@extends('default')

@section('title', 'Editar perfil')
@section('description', 'Edita os teus dados.')

@section('content')

    <div class="box box-default">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@patchUpdate'], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', 'Nome', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::input("text", 'name') !!}
                    <p class="help-block">O teu nome ou alcunha.</p>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('avatar', 'Avatar', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::file('avatar') !!}
                    <p class="help-block">(Opcional) A tua imagem de perfil.</p>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <img src="{{ url($user->avatar) }}">
                    <p class="help-block">Avatar atual.</p>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('privacy', 'Privacidade', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('privacy', ['0' => 'Público', '1' => 'Privado'], null, ['class' => 'form-control']) !!}
                    <p class="help-block">Altera a visibilidade do teu perfil.</p>
                </div>
            </div>

            <div class="box-footer col-sm-10 col-sm-offset-2">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection