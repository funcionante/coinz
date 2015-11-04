@extends('app')

@section('title', 'Novo exemplar')
@section('description', 'Adiciona um exemplar de uma moeda à coleção.')

@section('content')

    <div class="box box-default">
        {!! Form::open(['action' => ['CopiesController@store'], 'class' => 'form-horizontal']) !!}

        <div class="box-body">

            <div class="form-group">
                {!! Form::label('year', 'Ano', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::input("number", 'year', null, ['min' => '1999', 'max' => date("Y")]) !!}
                    <p class="help-block">(Opcional) Ano em que a moeda foi cunhada.</p>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('state', 'Estado', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::input('range', 'state', 5, ['min' => '0', 'max' => '10']) !!}
                    <p class="help-block">(Opcional) Estado de conservação da moeda. A escala vai de 0 até 10.</p>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('observations', 'Obervações', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('observations', null, ['class' => 'form-control', 'rows' => '3']) !!}
                    <p class="help-block">(Opcional) Alguma informação extra sobre a moeda, como por exemplo o nome da pessoa que ofereceu.</p>
                </div>
            </div>

            <div class="box-footer col-sm-10 col-sm-offset-2">
                {!! Form::submit('Adicionar exemplar', ['class' => 'btn btn-default']) !!}
            </div>

        </div><!-- /.box-body -->

        {!! Form::close() !!}
    </div><!-- /.box -->

@endsection