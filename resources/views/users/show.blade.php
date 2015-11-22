@extends('default')

@section('title', 'Perfil')
@section('description', 'Perfil do utilizador')

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{ $user->name }}</h3>
                    <h5 class="widget-user-desc">{{ $user->level }}</h5>
                </div>
                <div class="widget-user-image">
                    @if($user->avatar != null)
                        <img class="img-circle" src="{{ url($coin->avatar) }}" alt="Imagem de perfil">
                    @else
                        <img class="img-circle" src="{{  asset('/media/users/0.png') }}" alt="Sem imagem de perfil">
                    @endif
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
        </div>

    </div>

@endsection