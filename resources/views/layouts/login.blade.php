<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PM | Home</title>
    <!-- Bootstrap -->
    <link href="css/adminlte.min.css" rel="stylesheet">
</head>
<body id="ponnumaapillai" style="padding-top: 25px">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-danger">
        <div class="container">
            <div class="align-self-center">
                <img src="img/Logo-PonnuMaapillai.png" alt="Logo-Ponnu Maapillai" width="60" class="img-fluid"><a class="navbar-brand" href="{{url('/')}}"><strong class="text-white" style="font-size: 21px;">&nbsp; Ponnu Maapillai</strong></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto">
                </ul>
                <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                    <label>Registered User</label>
                    <div class="form-inline">
                        <div class="{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <input id="user_id" type="text" class=" form-control mb-2 mr-sm-2" placeholder="Matri ID" name="user_id" value="{{ old('user_id') }}" required autofocus>
                            @if ($errors->has('user_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class=" form-control  mb-2 mr-sm-2" placeholder="********" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-outline-light mb-2">Login</button>
                    </div>
                    <div class="col-xl-5">
                        <span class="p-0"><a onclick="" href="{{ url('/password/reset-mobile') }}"><lable class="text-white">Forgot password?</lable></a></span>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <br><br><br><br>
    <div id="id1" class="d-none">
        <nav class="navbar-expand-lg navbar-light bg-danger">
            <div class="container">
                <div>
                    <center><a href="/admin/login">Go To Admin</a></center>
                </div>
            </div>
        </nav>
    </div>
    <div id="id2" class="d-none">
        <nav class="navbar-expand-lg navbar-light bg-danger">
            <div class="container">
                <div>
                    <center><a href="/subadmin/login">Go To Subadmin Page</a></center>
                </div>
            </div>
        </nav>
    </div>
    <header>
        <div class="container" id="marquee">
            @if (session('status'))
                <div class="alert alert-success" role="alert"> {{ session('status') }} </div>
            @endif
            @if(Session::has('success'))
                    <div class="alert alert-success"> {{Session::get('success')}} </div>
            @endif
            @if(Session::has('message')) 
                    <div class="alert alert-info"> {{Session::get('message')}} </div> 
            @endif
            @if(Session::has('error'))
                    <div class="alert alert-danger"> {{Session::get('error')}} </div> 
            @endif
            <div class="row mt-5">
                @if(isset($scrollingmessage))
                    @foreach($scrollingmessage as $message)
                        <div class="col alert alert-warning">
                            <marquee class="text-danger" behavior="scroll" direction="left" scrollamount="8">
                                <h4>{{$message->scrolling_message}}</h4>
                            </marquee>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 pb-3 pt-3">
                <div>
                    <img src="img/banner1.jpg" alt="MEENAKSHI THIRUKALYANAM" class="img-fluid img-thumbnail w-100 h-100">
                    <div class="carousel-caption" style="align-content: center">
                        <h3 class="display text-white">New User</h3>
                        <p class="lead"><a class="btn btn-danger btn-lg btn-danger" href="{{ route('register') }}" role="button">Create Your Account</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 pb-3 pt-3"><img src="img/god.jpg" alt="MEENAKSHI THIRUKALYANAM" class="img-fluid img-thumbnail w-100 h-100">
                <div class="carousel-caption text-center">
                    <h4 class="text-capitalize">MEENAKSHI THIRUKALYANAM</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">&nbsp;</div>
    </div>
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
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
    <script src="js/jquery.jkey.js"></script>
    <script type="text/javascript">
        $(document).jkey('alt+a',function(){
            var hasClass = document.getElementById("id1").classList.contains('d-none');
            if (hasClass === true) {
                document.getElementById("id1").classList.remove("d-none");
            } else {
                document.getElementById("id1").classList.add("d-none");
            }
        });

        $(document).jkey('alt+s',function(){
            var hasClass = document.getElementById("id2").classList.contains('d-none');
            if (hasClass === true) {
                document.getElementById("id2").classList.remove("d-none");
            } else {
                document.getElementById("id2").classList.add("d-none");
            }
        });
    </script>
</body>
</html>
