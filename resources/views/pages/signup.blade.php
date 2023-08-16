<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>KSU Bangun Rejeki</title>
    <link href="//db.onlinewebfonts.com/c/7a8bc7c29b5bcadb9510cca51210ac46?family=Sitka+Banner" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('frontend/libraries/bootstrap/bootstrap-4.3.1-dist/css/bootstrap.css')}}   " />

    <link rel="stylesheet" href="{{url('frontend/styles/main.css')}} " />
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
                <img src="{{url('frontend/images/logo-koperasi-2.png')}}  " alt="">
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
                <div class=" justify-content-center ml-auto mr-auto mt-3">
                <div class="card card-details p-5">
                    <div class="sign-item">
                    <div class="sign-user ml-auto mr-auto">
                        <h1>Halo Pendaftar !</h1>
                        <h3 class="pb-4">Masukkan semua kolom dengan tepat !</h3>


                            <form action="{{route('register-account')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="form-group" >

                                <label for="nama"><h4>Nama</h4></label>
                                <input type="text" class="form-control input-type" id="nama" name="nama" aria-describedby="emailHelp"   placeholder="Masukkan Nama" >
                                </div>
                        
                                <div class="form-group">
                                <label for="NIK"><h4>NIK</h4></label>
                                <input type="text" class="form-control input-type" id="NIK" name="nik" placeholder="Masukan NIK"   />
                                </div>

                                <div class="form-group">
                                <label for="nohp"><h4>No HP</h4></label>
                                <input type="text" class="form-control input-type" id="no_hp" name="no_hp" placeholder="Masukkan No HP" />
                                </div>

                                <div class="form-group">
                                <label for="tempat_lahir"><h4>Tempat Lahir</h4></label>
                                <input type="text" class="form-control input-type" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir"   />
                                </div>

                                <div class="form-group">
                                <label for="tanggal_lahir"><h4>Tanggal Lahir</h4></label>
                                <input type="date" class="form-control input-type" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" />
                                </div>

                                <div class="form-group">
                                    <label for="alamat"><h4>Alamat</h4></label>
                                    <input type="text" class="form-control input-type" id="alamat" name="alamat" placeholder="Masukkan Alamat"   />
                                </div>

                                <div class="form-group">
                                <label for="bank"><h4>Bank </h4></label>
                                <p class="alert-bank-rekening"><b>*Isikan dengan format NAMA BANK - NO REKENING, CONTOH : BANK RAKYAT INDONESIA - 08835678991</b></p>
                                <P class="alert-bank-rekening"><b>*Apabila tidak punya boleh dikosongkan</b></P>
                                <input type="text" class="form-control input-type" id="bank" name="bank" placeholder="Masukkan Bank"/>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail"><h4>Email address</h4></label>
                                <input type="email" class="form-control input-type" id="exampleInputEmail" aria-describedby="emailHelp"  name="email" placeholder="Masukkan email"/>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword"><h4>Password</h4></label>
                                <input type="password" class="form-control input-type" id="exampleInputPassword" name="password" placeholder="Masukkan Password"  />
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword"><h4>Pas Foto 3x4</h4></label>
                                <input type="file" class="form-control-file input-type" id="exampleFormControlFile1" name="image_3x4">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword"><h4> Foto KTP</h4></label>
                                <input type="file" class="form-control-file input-type" id="exampleFormControlFile1" name="image_ktp">
                                </div>
                                <div class="text-center">

                                    <button type="submit" class="btn btn-sign-up mt-3 ml-5 px-5 py-2 text-center">Daftar!</button>
                                </div>
                            </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        </main>

        <!-- footer -->
        <footer class="section-footer mb-4 border-top">
        <div class="container-fluid ">
            <div class="row border-top justify-content-center align-items-center mt-5">
            <div class="col-auto text-gray-500 font-weight-light">2023 Copyright Koperasi Serba Usaha Bangun Rejeki</div>
            </div>
        </div>
        </footer>

        <script src="{{url('frontend/libraries/jquery/jquery-3.6.1.min.js')}}"></script>
        <script src="{{url('frontend/libraries/bootstrap/bootstrap-4.3.1-dist/js/bootstrap.js')}}"></script>
        <script src="{{url('frontend/libraries/retina/retina.min.js')}}"></script>
        <script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
        <script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}   "></script>
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
            rightIcon: '<img src="{{url('frontend/images/ic_calender2x.png')}}" width="15" />',
            },
        });
        </script>
    </body>
    </html>
