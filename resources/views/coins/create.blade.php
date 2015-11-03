@extends('app')

@section('title', 'Nova moeda')
@section('description', 'Adiciona um novo tipo de moeda à base de dados.')

@section('content')

    <div class="box box-default">
        {!! Form::open(['action' => 'CoinsController@store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

        <div class="box-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('currency', 'Divisa', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('currency', ['Euro'], null, ['class' => 'form-control', 'disabled']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('country', 'País', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('country', $countries, null, ['class' => 'form-control', 'multiple']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('value', 'Valor', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('value', [2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01], null, ['class' => 'form-control', 'multiple']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('img_back', 'Imagem', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::file('img_back') !!}
                    <p class="help-block">(Opcional) Imagem do verso da moeda.</p>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('commemorative', 'Tipo', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::checkbox('commemorative') !!} Comemorativa
                    <p class="help-block">Indicar se for uma versão comemorativa.</p>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Descrição', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
                    <p class="help-block">(Opcional) Alguma informação extra sobre a moeda, como por exemplo o significado dos símbolos presentes.</p>
                </div>
            </div>

            <div class="box-footer col-sm-10 col-sm-offset-2">
                {!! Form::submit('Adicionar moeda', ['class' => 'btn btn-default']) !!}
            </div>

        </div><!-- /.box-body -->

        {!! Form::close() !!}
    </div><!-- /.box -->

@endsection