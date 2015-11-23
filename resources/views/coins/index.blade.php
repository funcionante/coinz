@extends('default')

@section('title', 'Gerir coleção')

@section('description')

    Link de partilha: <a href="{{ $link }}">{{ $link }}</a>

@endsection

@section('content')

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

                        <a href="{{ action('CoinsController@show', [$coin->id]) }}"><img class="coin-thumb" src="{{ url($coin->img_back) }}"></a>

                    @else

                        <a href="{{ action('CoinsController@show', [$coin->id]) }}"><img class="coin-thumb coin-not-owned" src="{{ url($coin->img_back) }}"></a>

                    @endif

                @endforeach

            </div>
        </div>

    @endforeach

@endsection

@section('scripts')

    @include('partials._countries_index')

@endsection