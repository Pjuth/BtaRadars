<!DOCTYPE html>
<html>
<head>

    <title>@yield('title', 'Radars')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .links2 > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 25px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            box-shadow: 1px 2px 5px;
        }

        .auth-wrapper a {
            text-decoration: none;
            color: cadetblue;
        }

        .auth-wrapper ul {
            list-style: none;
        }

        .auth-wrapper a.dropdown-item {
            padding: 10px 97px 10px 20px;
        }

        .container {
            margin-top: 20px;
        }
    </style>

{{--Laravelio bibliotekos--}}
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    {{--end of Laravelio bibliotekos--}}

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="links2">
                <a href="{{route('radars.index')}}">Radarai</a>
                <a href="{{route('fuel_stations.index')}}">Degalinės</a>
                <a href="{{route('drivers.index')}}">Vairuotojai</a>
            </div>
        </div>
        <div class="col-md-1">
            {{--Language bar--}}
            {{--<form>--}}
                {{--<select class="selectpicker" data-width="fit" onchange="this.form.submit()">--}}
                    {{--<option {{ \Illuminate\Support\Facades\App::getLocale() == 'en' ? 'selected="selected"' : '' }} value="en" data-content='<span class="flag-icon flag-icon-us"></span> English'>English--}}
                    {{--</option>--}}
                    {{--<option {{ \Illuminate\Support\Facades\App::getLocale() == 'lt' ? 'selected="selected"' : '' }} value="lt" data-content='<span class="flag-icon flag-icon-lt"></span> Lithuanian'>--}}
                        {{--Lietuviškai--}}
                    {{--</option>--}}
                {{--</select>--}}
            {{--</form>--}}
            {{-- end ofLanguage bar--}}
{{--            {{        dd(App::getLocale())}}--}}
        </div>
        <div class="col-md-3">
            <!-- Authentication Links -->
            <div class="auth-wrapper">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
            <!-- end of Authentication Links -->
        </div>
    </div>
</div>
@yield('content')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous">
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>
</body>
</html>