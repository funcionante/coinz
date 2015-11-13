@extends('app')

@section('title', $title)
@section('description', 'Todas as moedas do utilizador.')

@section('content')

    @foreach($collection as $country)

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $country[0]->name_pt }}</h3>
            </div>
            <div class="box-body">

                @foreach($country as $coin)

                    @if($coin->user_id)

                        <a href="{{ action('CoinsController@show', [$coin->id]) }}"><img class="coin-thumb" src="{{ url($coin->img_back) }}"></a>

                    @else

                        <a href="{{ action('CoinsController@show', [$coin->id]) }}"><img class="coin-thumb coin-not-owned" src="{{ url($coin->img_back) }}"></a>

                    @endif

                @endforeach

            </div>
        </div>

    @endforeach

@endsection