@extends('default')

@section('title', 'Editar exemplar')
@section('description', 'Edita os dados de um exemplar.')

@section('content')

    <div class="box box-default">
        {!! Form::model($copy, ['method' => 'PATCH', 'action' => ['CopiesController@update', $copy->id], 'class' => 'form-horizontal']) !!}
        <div class="box-body">
            @include('copies._form', ['submitButtonText' => 'Guardar'])
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')

    @include('copies._updateState')

    <script>
        onload = function() {updateState()};
    </script>

@endsection