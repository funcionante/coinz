@extends('default')

@section('title', 'Novo exemplar')
@section('description', 'Adiciona um exemplar de uma moeda à coleção.')

@section('content')

    <div class="box box-default">
        {!! Form::open(['action' => ['CopiesController@store'], 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            @include('copies._form', ['submitButtonText' => 'Adicionar Exemplar'])
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')

    @include('copies._updateState')

    <script>
        onload = function() {
            document.getElementById('state').value = -1;
            updateState()
        };
    </script>

@endsection