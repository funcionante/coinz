@extends('app')

@section('title', 'Nova moeda')
@section('description', 'Adiciona um novo tipo de moeda à base de dados.')

@section('content')

    <div class="box box-default">
        {!! Form::model($coin, ['method' => 'PATCH', 'action' => ['CoinsController@update', $coin->id], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

        <div class="box-body">
            @include('errors.list')
            @include('coins._form', ['submitButtonText' => 'Guardar'])
        </div>

        {!! Form::close() !!}
    </div>

@endsection