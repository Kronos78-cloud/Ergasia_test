<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="/css/global.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">

    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <script src="/js/map.js"></script>
        <style>
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
        </style>
        <title>ΕΠΙΧΕΙΡΗΣΗ ΕΛΕΥΘΕΡΙΑ</title>
    </head>

    <body class="container">
            <div class="top-right links">
                <a href="{{ url('/main') }}">Login</a>
            </div>
        <header>
            <h1>ΕΠΙΧΕΙΡΗΣΗ ΕΛΕΥΘΕΡΙΑ</h1>
        </header>

        <div class="main">
            @yield('content')
        </div>

        <div class="footer clearfix">
            @yield('footer')
        </div>

        @yield('script')

    </body>
</html>
