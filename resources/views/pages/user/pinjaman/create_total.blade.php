@extends('layouts.user-payget')

@section('content')

{{-- @dd($createSimpananUser) --}}
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rincian Pinjaman </h1>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="table-responsive">
                    {{-- <form action="{{route('pinjaman-createTotalPost-user')}}" method="post"> --}}
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        @csrf
                        <tr>
                            <th>Nama</th>
                            <td>{{ Auth::user()->nama }}</td>
                        </tr>

                        <tr>
                            <th>Nominal Pinjaman</th>
                            <td>@currency($item->nominal_pinjaman) </td>
                        </tr>

                        <tr>
                            <th>Jasa</th>
                            <td> {{ $item->jasa}} %</td>
                        </tr>

                        <tr>
                            <th>Tenor</th>
                            <td> {{ $item->tenor / 12}} Tahun </td>
                        </tr>

                        <tr>
                            <th>Biaya Administrasi</th>
                            <td>@currency($item->administrasi )</td>
                        </tr>

                        <tr>
                            <th> Tipe Pembayaran</th>
                            <td>{{ $item->tipe_pembayaran }}</td>
                        </tr>

                        <tr>
                            <th> Biaya Admin</th>
                            <td>@currency($item->total_transaction - $item->administrasi )</td>
                        </tr>

                        <tr>
                            <th> Total Pembayaran</th>
                            <td>@currency( $item->total_transaction )</td>
                        </tr>
                        
                        <tr>
                            <th> Keterangan </th>
                            <td>{{ $item->keterangan == null ? '---' : $item->keterangan }}</td>
                        </tr>

                    </table> 
                    <button type="submit" class="btn btn-primary btn-block" id="pay-button"> Bayar </button>
                {{-- </form> --}}
            </div>    
        </div>
    </div>
</div>
@endsection