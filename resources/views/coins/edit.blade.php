@extends('app')

@section('title', 'Editar moeda')
@section('description', 'Edita os dados de uma moeda.')

@section('content')

    <div class="box box-default">
        {!! Form::model($coin, ['method' => 'PATCH', 'action' => ['CoinsController@update', $coin->id], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

        <div class="box-body">
            @include('coins._form', ['submitButtonText' => 'Guardar'])
        </div>

        {!! Form::close() !!}
    </div>

@endsection