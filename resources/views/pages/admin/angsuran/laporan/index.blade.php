@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"> Cetak Laporan Angsuran</h1>
    @if(session()->has('dataNull'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('dataNull')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-normal text-gray-800">Cetak Semua Laporan</div>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('angsuran-cetak-semualaporan')}}"  class="btn btn-sm btn-primary shadow-sm mb-4"><i
                                class="fas fa-download fa-sm text-white-50"></i> Laporan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-normal text-gray-800">Cetak Total Angsuran per Pinjaman</div>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('angsuran-totalangsuranpernama')}}"  class="btn btn-sm btn-primary shadow-sm mb-4"><i
                                class="fas fa-download fa-sm text-white-50"></i> Laporan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-normal text-gray-800">Cetak Laporan Per Nama</div>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('angsuran-laporan-carinama')}}"  class="btn btn-sm btn-primary shadow-sm mb-4"><i
                                class="fas fa-download fa-sm text-white-50"></i> Laporan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection