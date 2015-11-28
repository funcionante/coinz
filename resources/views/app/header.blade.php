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
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ url(Auth::user()->avatar) }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ url(Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->level}}
                                        <small>Membro desde {{ Auth::user()->created_at }}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ action('UsersController@getProfile', Auth::id()) }}" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>