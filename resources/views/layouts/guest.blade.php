<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PM | @yield('page_name')</title>
    <link href="/css/adminlte.min.css" rel="stylesheet">
    <link href="/css/fluid-gallery.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
</head>

<body id="ponnumaapillai" style="padding-top: 70px">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-danger">
        <div class="container">
            <div class="align-self-center"> <img src="/img/Logo-PonnuMaapillai.png" alt="Logo-Ponnu Maapillai" width="60" class="img-fluid"><a class="navbar-brand" href="{{url('/')}}"><strong class="text-white" style="font-size: 21px;">&nbsp; Ponnu Maapillai</strong></a> </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li><a class="mr-3" href="{{ url('/') }}"> Login </a> </li>
                        <li><a class="mr-3" href="{{ route('register') }}"> Register </a> </li>
                    @else
                        <li><a class="mr-3" href="{{url('/')}}"> {{ Auth::user()->user_id }} </a> </li>
                        <li><i class="fa fa-power-off"></i><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a> </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- body code goes here -->

    <header>
        @yield('marquee')
        <div class="container">
            <div class="row mt-3 mb-4">
                <div class="col">
                    @yield('heading')
                </div>
            </div>
        </div>
    </header>

    @yield('content')
                
    <hr>
    <footer class="footer text-muted" id="main_footer">
          <div class="container">
              <div class="row">
                  <div class="col text-center">
                      <div class="copy">
                          <p class="footer-block">| <a href="{{ url('about-us') }}" class="text-danger">About Us</a> | <a href="{{ url('Privacy') }}" class="text-danger">Privacy Policy</a> | <a href="{{ url('Terms') }}" class="text-danger">Terms and Conditions</a> | <a href="{{ url('gallery') }}" class="text-danger">Photo Gallery</a> | <a href="{{ url('contactus') }}" class="text-danger">Reach Us</a></p>
                          <p>All Rights Reserved.Copyright.© {!! date("Y") !!} Ponnu Maapillai Developed By <a href="http://linepix.in">Linepix.in</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-3.2.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap-4.0.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
    @yield('js')
</body>

</html>