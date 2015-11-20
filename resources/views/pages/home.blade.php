@extends('default')

@section('title', 'Home')
@section('description', 'O Coinz num relance.')

@section('content')

    <div class="row">

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-green-gradient">
                <div class="inner">
                    <h3>{{ $coins }}</h3>
                    <p>Total de moedas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-yellow-gradient">
                <div class="inner">
                    <h3>{{ $copies }}</h3>
                    <p>Total de exemplares</p>
                </div>
                <div class="icon">
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-red-gradient">
                <div class="inner">
                    <h3>{{ $users }}</h3>
                    <p>Total de utilizadores</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>

    </div>

@endsection