@extends('default')

@section('title', 'Home')
@section('description', 'O Coinz num relance.')

@section('content')

    <div class="row">

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red-gradient">
                <div class="inner">
                    <h3>{{ $nCoins }}</h3>
                    <p>Moedas registadas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green-gradient">
                <div class="inner">
                    <h3>{{ $nCopies }}</h3>
                    <p>Exemplares adicionados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-copy"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-blue-gradient">
                <div class="inner">
                    <h3>{{ $nCopiesUser }}</h3>
                    <p>Exemplares adicionados por ti</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow-gradient">
                <div class="inner">
                    <h3>{{ $nUsers }}</h3>
                    <p>Utilizadores registados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Moedas mais recentes</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Divisa</th>
                            <th>País</th>
                            <th>Valor</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coins as $coin)
                            <tr>
                                <td>{{ $coin->currency }}</td>
                                <td>{{ $coin->country }}</td>
                                <td>{{ $coin->value }}</td>
                                <td>{{ date("d/m/Y", strtotime($coin->date)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Os teus exemplares mais recentes</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Divisa</th>
                            <th>País</th>
                            <th>Valor</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($copies as $copy)
                            <tr>
                                <td>{{ $copy->currency }}</td>
                                <td>{{ $copy->country }}</td>
                                <td>{{ $copy->value }}</td>
                                <td>{{ date("d/m/Y", strtotime($copy->date)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection