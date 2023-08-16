<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KSU Bangun Rejeki</title>
    <link href="//db.onlinewebfonts.com/c/7a8bc7c29b5bcadb9510cca51210ac46?family=Sitka+Banner" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('frontend/libraries/bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css')}}" />

    <link rel="stylesheet" href="{{url('frontend/styles/main.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/libraries/gijgo/css/gijgo.min.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}" />
    </head>
    <body>
        <!-- navbar -->
        <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <!-- ml-auto and mr-auto biar logo auto tengah -->
            <!-- mr-sm-auto utk layar kecil -->
            <!-- mr-lg-0 utk layar besar -->
            <!-- mr-md-auto utk layar sedang -->
            <div class="navbar-nav ml-auto mr-auto navbar-brand mr-sm-auto mr-lg-0 mr-md-auto text-center">
            <a href="{{route('home')}}">
                <img src="{{url('frontend/images/logo-koperasi-2.png')}}" alt="">
            </a>
            </div>
            <!-- mr-auto biar tulisan auto tengah dari kanan -->
            <!-- d-none d-lg-block biar tulisan dari layar kecil tidak ada -->
            <ul class="navbar-nav mr-auto d-none d-lg-block">
            <li font-size="100px" color="white">
            <span class="text-white">&nbsp;&nbsp;</span>
            </li>
        </ul>
        </nav>
        
        </div>

        <!-- main content -->
        <main>
        <!-- paket/travel -->
        <section class="section-sign-header"></section>
        <section class="section-sign-content">
            <div class="container">
            <div class="row">
                <div class="justify-content-center ml-auto mr-auto mt-4">
                <div class="card card-details">
                    <div class="sign-item">
                    <div class="sign-user ml-auto mr-auto">
                        <h1>SELAMAT DATANG !</h1>
                        <h3 class="pb-4">Masukkan email dan password anda!</h3>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @if(session()->has('accountError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('accountError')}}
                                <button type="button" data-dismiss="alert" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if(session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError')}}
                                <button type="button" data-dismiss="alert" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success')}}
                                <button type="button" data-dismiss="alert" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                        <form action="{{route('login-account')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email"><h4>Email</h4></label>
                                <input type="text" class="form-control input-type" id="email" aria-describedby="emailHelp" name="email" placeholder="Masukan Email" />
                            </div>
                            <div class="form-group mt-4">
                                <label for="password"><h4>Password</h4></label>
                                <input type="password" class="form-control input-type" id="password" name="password" placeholder="Password" />
                            </div>
                            <button type="submit" class="btn btn-sign-up mt-3 ml-5 px-5 py-2" > Masuk</button>

                        </form>
                        <div class="ml-4 mt-2">
                        <p>
                            Tidak punya akun ?
                            <a href="{{route('register')}}"> <span> Daftar </span></a>
                        </p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        </main>

        <!-- footer -->
        <footer class="section-footer border-top">
        <div class="container-fluid">
            <div class="row border-top justify-content-center align-items-center pt-5">
            <div class="col-auto text-gray-500 font-weight-light">2023 Copyright Koperasi Serba Usaha Bangun Rejeki</div>
            </div>
        </div>
        </footer>

        <script src="{{url('frontend/libraries/jquery/jquery-3.6.1.min.js')}}"></script>
        <script src="{{url('frontend/libraries/bootstrap/bootstrap-4.3.1-dist/js/bootstrap.js')}}"></script>
        <script src="{{url('frontend/libraries/retina/retina.min.js')}}"></script>
        <script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
        <script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
        <script>
        $(document).ready(function () {
            $(".xzoom, .xzoom-gallery").xzoom({
            zoomWidth: 500,
            title: false,
            tint: "#333",
            Xoffset: 15,
            });
        });

        $(".datepicker").datepicker({
            uiLibrary: "bootstrap4",
            icons: {
            rightIcon: '<img src="{{url('frontend/images/ic_calender2x.png')}}    " width="15" />',
            },
        });
        </script>
    </body>
</html>
