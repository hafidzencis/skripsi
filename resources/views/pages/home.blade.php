<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KSU Bangun Rejeki</title>
    <link href="//db.onlinewebfonts.com/c/7a8bc7c29b5bcadb9510cca51210ac46?family=Sitka+Banner" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('frontend/libraries/bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css')}}" />

    <link rel="stylesheet" href="{{url('frontend/styles/main.css')}} " />
    </head>
    <body>

    <!-- navbar -->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{route('home')}}" class="navbar-brand">
            <img src="{{url('frontend/images/logo-koperasi.png')}}" alt="" srcset="" />
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="{{route('register')}}" class="nav-link active"> Register </a>
                </li>
                <!-- <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link"> Paket Travel </a>
                </li>
                <li class="nav-item dropdown mx-md-2">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown"> Services </a>
                    <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Link 1</a>
                    <a href="#" class="dropdown-item">Link 2</a>
                    <a href="#" class="dropdown-item">Link 3</a>
                    </div>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link"> Testimonial </a>
                </li>-->
            </ul> 


            <!-- Mobile Button -->
            {{-- @auth
                <form class="form-inline d-sm-block d-md-none" action="{{ route('logout')}}" method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0">Keluar</button>
                </form>
            @else --}}
                <form class="form-inline d-sm-block d-md-none" action="{{ route('login') }}" method="GET">
                    <button class="btn btn-login my-2 my-sm-0">Masuk</button> 
                </form>
            {{-- @endauth --}}

            {{-- <!-- Dekstop Button -->
            @auth
            <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" onclick="alert('Yakin anda mau keluar?')">Keluar</button>
            </form> 
            @else --}}

            <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{route('login')}}" method="GET">
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">Masuk</button>
            </form>

            {{-- @endauth --}}


        </div>
        </nav>
    </div>

    <!-- header -->
    <header class="text-center">
        <h1 class="mt-3">
            DENGAN MENEKAN TOMBOL DI BAWAH
        <br />
            ANDA BISA JADI ANGGOTA KOPERASI
        </h1>

        <p class="mt-3">
            Ayo segera daftar!
            <br />
        </p>

        <a href="{{ route('register')}}" class="btn btn-get-started px-4 mt-4"> Daftar </a>
    </header>

    <!-- content -->
    <main>
        <!-- statistic -->
        <!-- <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
            <h2>20K</h2>
            <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
            <h2>7</h2>
            <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
            <h2>3K</h2>
            <p>Destination</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
            <h2>7</h2>
            <p>Partners</p>
            </div>
        </section>
        </div> -->

        <!-- wisata popular -->
        <section class="section-popular" id="headingPopular">
        <div class="container">
            <div class="row">
            <div class="col text-center section-popular-heading">
                <h2>Alasan harus menjadi anggota koperasi</h2>
                <br />
                
                <br>
                <p>1. Investasi</p>
                <br>
                <p>2. Bunga Pinjaman Rendah</p>
                <br>
                <p>3. Menambah Jangkauan Relasi</p>
            </div>
            </div>
        </div>
        </section>

        <!-- card vacation -->
        <section class="section-popular-content" id="popularContent">
            
        </section>

        <!-- network team -->
        <section class="section-networks" id="networks">
        <div class="container">
            <div class="row">
            <div class="col text-center">
                <h2>Tentang Kami</h2>
                <br />
                <p>Koperasi Serba Usaha berada di Desa Bangunsari, Sragen Kulon, Sragen. Koperasi ini merupakan koperasi konsumen yang memiliki tujuan untuk membantu, mendidik, dan melayani anggota untuk meningkatkan kesejahteraan anggota. </p>  

                
            </div>

            <div class="col text-center">
                <h2>Contact Person</h2>
                <br />
                <p> Admin Wa : +62 857-2533-0156  <b>(Bangun)</b></p>  

                
            </div>

            </div>
            </div>
        </section>

        

        <!-- testimonials heading -->
        <!-- <section class="section-testimonials-heading" id="testimonialsHeading">
            <div class="container">
            <div class="row">
                <div class="col text-center">
                <h2>MAKE MOMENTS WITH YOUR LOVE</h2>
                <br />
                <p>
                every moments cannot be
                <br />
                repeated just let it go
                </p>
                </div>
            </div>
            </div>
        </section>

        <!-- testimonial-person and button -->
        <!-- <div class="section section-testimonials-content" id="testimonialsContent">
            <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial-person d-flex flex-column text-center">
                    <div class="testimonial-content">
                    <img src="frontend/images/foto-testi-1.jpg" alt="foto-testi-1" class="mb-4 rounded-circle" />
                    <h3 class="mb-4">Hafidz Febrian</h3>
                    <p class="testimonial">"the moments in every vacation cannot forget,like playing together, eat together"</p>
                </div>
                <hr />
                <p class="trip mt-2">Trip to Garuda Wisnu Kencana</p>
                <br />
                <p class="trip trip-down">Bali</p>
                </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial-person text-center d-flex flex-column">
                    <div class="testimonial-content">
                    <img src="frontend/images/foto-testi-2.jpg" alt="foto-testi-1" class="mb-4 rounded-circle" />
                    <h3 class="mb-4">Zaskia Gotik</h3>
                    <p class="testimonial">"the trip was amazing and I saw something beautiful in that island"</p>
                    </div>
                <hr />
                <p class="trip mt-2">Trip to Labuan Bajo</p>
                <br />
                <p class="trip trip-down">NTT</p>
                </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial-person text-center d-flex flex-column">
                    <div class="testimonial-content">
                    <img src="frontend/images/foto-testi-3.jpg" alt="foto-testi-1" class="mb-4 rounded-circle" />
                    <h3 class="mb-4">Indra Kenz</h3>
                    <p class="testimonial">"I loved it when the view of between samosir and toba "</p>
                    </div>
                    <hr />
                    <p class="trip mt-2">Trip to Toba Lake</p>
                    <br />
                    <p class="trip trip-down">Sumatera Utara</p>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                <a href="#" class="btn btn-need-help px-4 mx-4 mt-4">I Need Help</a>
                <a href="#" class="btn btn-get-started px-4 mx-4 mt-4">Get Started</a>
                </div>
            </div>
            </div>
        </div> -->
        </main>

    <!-- footer -->
        <footer class="section-footer mb-4 border-top">
        <div class="container-fluid">
            <div class="row border-top justify-content-center align-items-center pt-4">
            <div class="col-auto text-gray-500 font-weight-light">2023 Copyright Koperasi Serba Usaha Bangun Rejeki</div>
            </div>
        </div>
        </footer>

    <script src="{{url('frontend/libraries/jquery/jquery-3.6.1.min.js')}}   "></script>
    <script src="{{url('frontend/libraries/bootstrap/bootstrap-4.3.1-dist/js/bootstrap.js')}} "></script>
    <script src="{{url('frontend/libraries/retina/retina.min.js')}}   "></script>
    </body>
</html>
