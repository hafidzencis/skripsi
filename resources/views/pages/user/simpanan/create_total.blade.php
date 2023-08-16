@extends('layouts.user-payget')

@section('content')

{{-- @dd($createSimpananUser) --}}
<div class="container-fluid">
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rincian Simpanan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="table-responsive">
                    {{-- <form action="{{route('simpanan-user-create-total-post')}}" method="post"> --}}
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        @csrf
                        <tr>
                            <th>Nama</th>
                            <td>{{ Auth::user()->nama }}</td>
                        </tr>

                        <tr>
                            <th>Tipe Simpanan</th>
                            <td> 
                                @if ($item->type_deposit_id == 1  )
                                    Simpanan Pokok
                                @else
                                    Simpanan Wajib
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Nominal Simpanan</th>
                            <td> @currency($item->nominal_simpanan) </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td> {{$item->status}} </td>
                        </tr>

                        <tr>
                            <th> Tipe Pembayaran</th>
                            <td>{{ $item->tipe_pembayaran }}</td>
                        </tr>

                        <tr>
                            <th> Admin Fee</th>
                            <td>@currency($item->total_transaction - $item->nominal_simpanan)</td>
                        </tr>

                        <tr>
                            <th> Total Transaction</th>
                            <td> @currency($item->total_transaction) </td>
                        </tr>

                        <tr>
                            <th> Keterangan</th>
                            <td> {{$item->keterangan == null ? '---' : $item->keterangan }}</td>
                        </tr>
                        
                    </table> 
                    <button type="submit" class="btn btn-primary btn-block" id="pay-button"> Bayar </button>
                {{-- </form> --}}
            </div>    
        </div>
    </div>
</div>

@endsection