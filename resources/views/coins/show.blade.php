@extends('app')

@section('title', $title = 'Exemplares')
@section('description', 'Todos os exemplares desta moeda')

@section('content')

    <div class="row">

        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-body text-center">
                    @if($coin->img_back != "")
                        <img class="coin-full" src="{{ url($coin->img_back) }}" alt="Imagem da moeda">
                    @endif
                    <table class="table table-striped">
                        <tr><td><b>Divisa</b></td><td>{{ $coin->currency }}</td></tr>
                        <tr><td><b>País</b></td><td>{{ $coin->country }}</td></tr>
                        <tr><td><b>Valor</b></td><td>&euro; {{ $coin->value }}</td></tr>
                        @if($coin->commemorative)
                            <tr><td colspan="2"><b>Comemorativa</b></td></tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-9">

            @if(Session::has('alert_success'))
                <div class="alert alert-success" role="alert" id="alert">
                    {{ session('alert_success') }}
                </div>
            @endif

            @if(count($copies) != 0)
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Exemplares</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cunhagem</th>
                                <th>Estado</th>
                                <th>Observações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($copies as $copy)
                                <tr>
                                    <td>{{ $copy->id }}</td>
                                    <td>
                                        @if($copy->year != 0)
                                            {{ $copy->year }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($copy->state != -1)
                                            {{ $copy->state }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $copy->observations }}</td>
                                    <td>
                                        {!! Form::open(['action' => ['CopiesController@destroy', $copy->id], 'method' => 'DELETE']) !!}
                                        <a href="{{ action('CopiesController@edit', $copy->id) }}"><span title="editar" class="glyphicon glyphicon-pencil btn btn-sm" aria-hidden="true"></span></a>
                                        <a><span title="eliminar" class="glyphicon glyphicon-trash btn btn-sm" aria-hidden="true" onclick="parentNode.parentNode.submit()"></span></a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div></div>
            @else
                <div class="box box-default">
                    <div class="box-body">
                        Ainda não existem exemplares.
                    </div>
                </div>
            @endif

            <a href="{{ action('CopiesController@create', [$coin->id]) }}" class="btn btn-default btn-sm" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo exemplar
            </a>
            <div class="pull-right">
                <a href="{{ action('CoinsController@index') }}" class="btn btn-default btn-sm" role="button">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar à minha coleção
                </a>
                <a href="{{ action('CoinsController@edit', [$coin->id]) }}" class="btn btn-default btn-sm" role="button">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar moeda
                </a>
            </div>
        </div>

    </div>

@endsection