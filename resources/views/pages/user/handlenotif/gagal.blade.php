<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
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
                <div class="section-success d-flex align-item-center pt-5">
                    <div class="col text-center">
                        <img src="{{ url('frontend/images/img_fail.png')}} " alt="" class="img-successcheckout">
                    <h3 class="pt-3">TRANSAKSI KAMU GAGAL</h3>
                    <p>
                        Buat transaksi lagi !

                    </p>
                    <a href="{{route('index-dashboard-user')}}" class="btn btn-to-homepage mt-3 px-4"> DASHBOARD </a>
                    </div>
                </div>
            </main>

            <script src="{{url('frontend/libraries/jquery/jquery-3.6.1.min.js')}}"></script>
            <script src="{{url('frontend/libraries/bootstrap/bootstrap-4.3.1-dist/js/bootstrap.js')}}"></script>
            <script src="{{url('frontend/libraries/retina/retina.min.js')}}"></script>
            <script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
            <script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>

        </body>
</html>
