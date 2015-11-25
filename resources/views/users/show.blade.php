@extends('default')

@section('title', 'Perfil')
@section('description', 'Perfil do utilizador')

@section('content')

    <div class="box box-widget widget-user">
        <div class="widget-user-header bg-aqua-active">
            @if(Request::user()->id == $user->id)
                <div class="pull-right">
                    <a href="{{ action('UsersController@getEdit') }}" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar perfil
                    </a>
                </div>
            @endif
            <h3 class="widget-user-username">{{ $user->name }}</h3>
            <h5 class="widget-user-desc">{{ $user->level }}</h5>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="{{ url($user->avatar) }}" alt="Imagem de perfil">
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-6 border-right">
                    <div class="description-block">
                        <span class="description-text">Membro desde</span>
                        <h5 class="description-header">{{ $user->created_at }}</h5>
                    </div>
                </div>
                <div class="col-sm-6 border-right">
                    <div class="description-block">
                        <span class="description-text">Número de moedas</span>
                        <h5 class="description-header">{{ $user->nCoins }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav>
        <ul class="pagination" id="list">
            <li class="active"><a><span class="glyphicon glyphicon-search"></span></a></li>
        </ul>
    </nav>

    @foreach($collection as $country)

        <div class="box box-default">
            <div class="box-header with-border">
                <a class="anchor" name="{{ $country[0]->name_pt }}"></a>
                <h3 class="box-title">{{ $country[0]->name_pt }}</h3>
            </div>
            <div class="box-body">

                @foreach($country as $coin)

                    @if($coin->user_id)

                        <img class="coin-thumb" src="{{ url($coin->img_back) }}">

                    @else

                        <img class="coin-thumb coin-not-owned" src="{{ url($coin->img_back) }}">

                    @endif

                @endforeach

            </div>
        </div>

    @endforeach

@endsection

@section('scripts')

    @include('partials._countries_index')

@endsection