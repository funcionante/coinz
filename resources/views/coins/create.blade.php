@extends('default')

@section('title', 'Nova moeda')
@section('description', 'Adiciona um novo tipo de moeda à base de dados.')

@section('content')

    <div class="box box-default">
        {!! Form::open(['action' => 'CoinsController@store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

        <div class="box-body">
            @include('coins._form', ['submitButtonText' => 'Adicionar Moeda'])
        </div>

        {!! Form::close() !!}
    </div>

@endsection