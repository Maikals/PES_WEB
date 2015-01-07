<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    {{ HTML::script('jquery-1.11.1.min.js') }}
    {{ HTML::script('jquery-ui-1.11.2/jquery-ui.min.js') }}
    {{ HTML::style('jquery-ui-1.11.2/jquery-ui.css') }}
    {{ HTML::style('jquery-ui-1.11.2/jquery-ui.theme.min.css') }}
</head>

<body>

    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">Gestió de Subscripcions</a>

        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <p class="navbar-text">

                @if (Auth::check())
                Ha iniciat sessió com
                <a href="{{{ route('subscriptors.show', Auth::user()->id) }}}">{{Auth::user()->nom}}</a>
                @else
                No ha iniciat cap sessió
                @endif
                </p>
            </li>
            <li>
                <p class="navbar-text">
                @if (Auth::check())
                <a href="{{ URL::to('logout') }}">Tanca sessió</a>
                @else
                <a href="{{ URL::to('login') }}">Inicia sessió</a>
                @endif
                </p>
            </li>
        </ul>
      </div>
    </nav>

    <div id="left-sidebar" class="col-md-2">
        @if (Auth::check())
        <div class="btn-group-vertical">
            <a href="{{ URL::to('/') }}" class="btn btn-default" style="text-align:left;">
                <span class="glyphicon glyphicon-home"></span>
                <span>Inici</span>
            </a>
            @if (Session::has('admin'))
                <a href="{{ URL::to('editorials') }}" class="btn btn-default disabled" style="text-align:left;">
                    <span class="glyphicon glyphicon-file"></span>
                    <span>Editorials</span>
                </a>
                <a href="{{ URL::to('publicacios') }}" class="btn btn-default" style="text-align:left;">
                    <span class="glyphicon glyphicon-book"></span>
                    <span>Publicacions</span>
                </a>
                <a href="{{ URL::to('subscriptors') }}" class="btn btn-default" style="text-align:left;">
                    <span class="glyphicon glyphicon-user"></span>
                    <span>Subscriptors</span>
                </a>
            @endif
            <a href="{{ URL::to('subscripcios') }}" class="btn btn-default" style="text-align:left;">
                <span class="glyphicon glyphicon-plus"></span>
                <span>Subscripcions</span>
            </a>
            <a href="{{ URL::to('vals') }}" class="btn btn-default" style="text-align:left;">
                <span class="glyphicon glyphicon-qrcode"></span>
                <span>Vals</span>
            </a>
            <a href="{{ URL::to('quioscs') }}" class="btn btn-default disabled" style="text-align:left;">
                <span class="glyphicon glyphicon-usd"></span>
                <span>Quioscs</span>
            </a>
            <a href="#" class="btn btn-default disabled" style="text-align:left;">
                <span class="glyphicon glyphicon-warning-sign"></span>
                <span>Incidències</span>
            </a>

        </div>
        @endif
    </div>
    <div id="central-content" class="col-md-8">

        @if (Session::has('message'))
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span>{{Session::get('message')}}</span>
        </div>
        @endif

        @yield('content')

    </div>
    
    @yield('scripts')

</body>
</html>