<!-- Main Header -->
<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                @if (!Auth::guest())
                    <a href="{{ action('PagesController@home') }}" class="navbar-brand"><b>COINZ</b></a>
                @else
                    <a href="{{ action('PagesController@index') }}" class="navbar-brand"><b>COINZ</b></a>
                @endif
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    @if (!Auth::guest())
                        @if(Request::user()->isManager())
                            <li class="@if( Request::path() == 'coins/create' ) active @endif"><a href="{{ action('CoinsController@create') }}">Nova moeda <span class="sr-only">(current)</span></a></li>
                        @endif
                        <li class="@if( Request::path() == 'coins' ) active  @endif"><a href="{{ action('CoinsController@index') }}">Gerir coleção</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="@if( Request::path() == 'about' ) active @endif""><a href="{{ action('PagesController@about') }}">Sobre</a></li>
                    <li><a href="http://www.github.com/funcionante/coinz" target="_blank">GitHub</a></li>
                    @if (Auth::guest())
                        <li class="blue"><a href="{{ url('/auth/login') }}"><b>Entrar</b></a></li>
                        <li><a href="{{ url('/auth/register') }}"><b>Registar</b></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <b>{{ Auth::user()->name }}</b> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ action('UsersController@show', Auth::id()) }}">Ver perfil</a></li>
                                <li><a href="{{ url('/auth/logout') }}">Sair</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>