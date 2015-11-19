@extends('default')

@section('title', $title)

@section('description')

    Link de partilha: <a href="{{ $link }}" target="_blank">{{ $link }}</a>

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

    <script>

        $.get("api/countries", function(countries) {

            // For each letter in the alphabet
            for(var letter = 'A'; letter <= "Z"; letter = nextChar(letter)) {

                var elem = document.createElement("li");
                var a = document.createElement("a");
                elem.appendChild(a);
                a.innerHTML = letter;

                for(var i = 0; i < countries.length; i++) {

                    // link to the first country that starts with that letter
                    if (countries[i].substring(0,1) == letter) {
                        a.setAttribute("href", "#" + countries[i]);
                        break;
                    }
                    // or set it disabled if no country was found.
                    if (i == countries.length - 1) {
                        elem.setAttribute("class", "disabled");
                    }

                }

                document.getElementById("list").appendChild(elem);
            }
        });

        function nextChar(c) {
            return String.fromCharCode(c.charCodeAt(0) + 1);
        }

    </script>

@endsection