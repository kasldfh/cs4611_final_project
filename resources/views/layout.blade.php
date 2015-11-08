<html>
    <head>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.1/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href=url(favcion.ico)>
    <link rel="stylesheet" href="style.css">
    @yield('style')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    @yield('js')

    </head>
    <body>
        <div class="container">
            {{-- header --}}
	        <div class="titleBar">
                <a href="/">
                    <h1>Best Syrup Site Ever</h1>
                </a>
	        </div>

            {{-- content --}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @yield('content')
                </div>
            </div>

            {{-- footer --}}
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="footer-container">
                    <hr>
                    <footer><center> © Mazin Jindeel and Kris Samuelson 2015 </center></footer>
                </div>
                </div>
            </div>
        </div>

    </body>
</html>
