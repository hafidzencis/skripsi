@extends('layouts.user')

@section('content')


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Simpanan</h1>
    </div>


    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        @csrf
                        <tr>
                            <th>Nama</th>
                            <td>{{ $item->users->nama }}</td>
                        </tr>

                        <tr>
                            <th>Tipe Simpanan</th>
                            <td> {{ $item->type_deposits->nama_tipe_deposit }}</td>
                        </tr>

                        <tr>
                            <th>Nominal Simpanan</th>
                            <td> @currency($item->nominal_simpanan)</td>
                        </tr>

                        <tr>
                            <th> Simpanan Dibuat</th>
                            <td>{{$item->created_at->format('Y-m-d')}}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td> {{ $item->status }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Pembayaran</th>
                            <td>{{ $item->tanggal_membayar == null ? '---' : $item->tanggal_membayar }}</td>
                        </tr>

                        <tr>
                            <th> Tipe Pembayaran</th>
                            <td>{{ $item->tipe_pembayaran }}</td>
                        </tr>

                        <tr>
                            <th> Biaya Admin</th>
                            @if ( $item->total_transaction == null)
                                <td> ---</td>
                            @else
                                <td>
                                    @currency($item->total_transaction - $item->nominal_simpanan) 
                                </td>
                            @endif
                        </tr>
    
                        <tr>
                            <th>Total Transaction</th>
                            @if ( $item->total_transaction == null)
                                <td> --- </td>
                            @else
                                <td>
                                    @currency($item->total_transaction) 
                                </td>
                            @endif
                        </tr>
    

                        <tr>
                            <th> Keterangan </th>
                            <td>{{ $item->keterangan == null ? '---' : $item->keterangan}}</td>
                        </tr>   
                    </table> 
                </form>
            </div>    
        </div>
    </div>
</div>
@endsection