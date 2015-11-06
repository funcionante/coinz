@extends('app')

@section('title', 'Editar exemplar')
@section('description', 'Adiciona um exemplar de uma moeda à coleção.')

@section('content')

    <div class="box box-default">
        {!! Form::model($copy, ['method' => 'PATCH', 'action' => ['CopiesController@update', $copy->id], 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            @include('copies._form', ['submitButtonText' => 'Editar Exemplar'])
        </div>
        {!! Form::close() !!}
    </div>

    <script>
        onload = function() {updateState()};
        function updateState() {
            var state = document.getElementById('state').value;
            var display = document.getElementById('state-display');

            if(state == -1)
                display.innerHTML = 'Vazio';
            else
                display.innerHTML = state;
        }
    </script>

@endsection