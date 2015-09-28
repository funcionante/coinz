@extends('app')

@section('title', $title = 'A minha coleção')
@section('description', 'Todas as moedas registadas.')

@section('content')


    {{ $country = null}}

    {{-- Ugly but working! --}}
    @foreach($coins as $coin)


        @if (!isset($country))

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $country = $coin->name_pt }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @elseif($country != $coin->name_pt)
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $country = $coin->name_pt }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @endif

                    @if($coin->user_id)
                        <a href="{{ action('CoinsController@show', [$coin->id]) }}"><img class="coin-thumb" src="{{ url($coin->img_back) }}"></a>
                    @else
                        <a href="{{ action('CoinsController@show', [$coin->id]) }}"><img class="coin-thumb coin-not-owned" src="{{ url($coin->img_back) }}"></a>
                    @endif

                    @endforeach
                </div></div>

@endsection