@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cetak Laporan Pinjaman </h1>
        </a>
    </div>

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
                            <a href="{{ route('pinjaman-cetaksemua')}}"  class="btn btn-sm btn-primary shadow-sm mb-4"><i
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
                            <div class="h5 mb-0 font-weight-normal text-gray-800">Cetak Total Pernama</div>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('pinjaman-totalpinjamanpernama')}}"  class="btn btn-sm btn-primary shadow-sm mb-4"><i
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
                            <a href="{{ route('pinjaman-pernama-laporan')}}"  class="btn btn-sm btn-primary shadow-sm mb-4"><i
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