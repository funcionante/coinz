@extends('default')

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
                                        <a href="{{ action('CopiesController@edit', $copy->id) }}" class="small glyphicon glyphicon-pencil" title="editar exemplar"></a>
                                        &nbsp;
                                        <a href="{{ action('CopiesController@destroy', [$copy->id]) }}" data-confirm="Tens a certeza que queres eliminar este exemplar?" data-token="{{csrf_token()}}" data-method="delete" class="small glyphicon glyphicon-remove" title="eliminar exemplar"></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="box box-default">
                    <div class="box-body">
                        Ainda não tens exemplares desta moeda.
                    </div>
                </div>
            @endif

            <a href="{{ action('CoinsController@index') . '#' . $coin->country }}" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar à minha coleção
            </a>
            <a href="{{ action('CopiesController@create', [$coin->id]) }}" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo exemplar
            </a>

            @if(Request::user()->isManager())
                <div class="pull-right">
                    <a href="{{ action('CoinsController@edit', [$coin->id]) }}" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar moeda
                    </a>
                    <a href="{{ action('CoinsController@destroy', [$coin->id]) }}" data-confirm="Tens a certeza que queres eliminar esta moeda?" data-token="{{csrf_token()}}" data-method="delete" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar moeda
                    </a>
                </div>
            @endif

        </div>

    </div>

@endsection

@section('scripts')

    <script src="{{ asset ("/js/delete-request.js") }}"></script>

@endsection