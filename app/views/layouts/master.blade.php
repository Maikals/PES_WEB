<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">APP</a>

        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <p class="navbar-text">

                @if (Auth::check())
                Signed in as
                <a href="{{{ route('subscriptors.show', Auth::user()->id) }}}">{{Auth::user()->nom}}</a>
                @else
                You are not signed in.
                @endif
                </p>
            </li>
            <li>
                <!--<button type="button" class="btn btn-default navbar-btn">
                Sign out
                </button>-->
                <p class="navbar-text">

                @if (Auth::check())
                <a href="{{ URL::to('logout') }}">Logout</a>
                @endif
                </p>
            </li>
        </ul>
      </div>
    </nav>

    <div id="left-sidebar" class="col-md-2">
        @if (Auth::check())
        <div class="btn-group-vertical">
            <a href="{{ URL::to('administradors') }}" class="btn btn-default">administradors</a>
            <a href="{{ URL::to('compras') }}" class="btn btn-default">compras</a>
            <a href="{{ URL::to('editorials') }}" class="btn btn-default">editorials</a>
            <a href="{{ URL::to('publicacios') }}" class="btn btn-default">publicacios</a>
            <a href="{{ URL::to('quioscs') }}" class="btn btn-default">quioscs</a>
            <a href="{{ URL::to('subscripcios') }}" class="btn btn-default">subscripcios</a>
            <a href="{{ URL::to('vals') }}" class="btn btn-default">vals</a>
            <a href="{{ URL::to('subscriptors') }}" class="btn btn-default">subscriptors</a>
        </div>
        @endif
    </div>
    <div id="central-content" class="col-md-8">
        @yield('content')
    </div>

</body>
</html>