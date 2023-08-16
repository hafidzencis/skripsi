@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Angsuran  </h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">

                    <tr>
                        <th> Nama </th>
                        <td> {{ $item->users->nama }}</td>
                    </tr>

                    <tr>
                        <th> Nominal Pinjaman </th>
                        <td> @currency($item->loans->nominal_pinjaman)</td>
                    </tr>

                    <tr>
                        <th> Tipe Angsuran</th>
                        <td> {{ $item->type_installments->nama_tipe_angsuran}}</td>
                    </tr>

                    <tr>
                        <th> Nominal Angsuran</th>
                        <td> @currency($item->nominal_angsuran)</td>
                    </tr>

                    <tr>
                        <th>Angsuran Ke</th>
                        <td>{{ $item->angsuran_ke}}</td>
                    </tr>

                    <tr>
                        <th> Angsuran Dibuat</th>
                        <td>{{$item->created_at->format('Y-m-d')}}</td>
                    </tr>

                    <tr>
                        <th> Tenor</th>
                        <td> {{ $item->loans->tenor / 12 }}Tahun </td>
                    </tr>

                    <tr>
                        <th> Status </th>
                        <td>{{ $item->status}}</td>
                    </tr>

                    <tr>
                        <th> Tanggal Pembayaran </th>
                        <td>{{ $item->tanggal_pembayaran == null ? '---' : $item->tanggal_pembayaran }}</td>
                    </tr>

                    <tr>
                        <th> Tipe Pembayaran</th>
                        <td> {{ $item->tipe_pembayaran}}</td>
                    </tr>
                    <tr>
                        <th> Nominal Kurangnya</th>
                        <td>@currency($item->nominal_hasil)</td>
                    </tr>
                    <tr>
                        <th> Biaya Admin</th>
                        <td>@if ( $item->total_transaction == null )
                                ---
                            @else
                                @currency($item->total_transaction - $item->nominal_angsuran)
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th> Total Pembayaran </th>
                        <td>@if ( $item->total_transaction == null )
                            ---
                        @else
                            @currency($item->total_transaction - $item->nominal_angsuran)
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <th> Keterangan </th>
                        <td>{{ $item->keterangan == null ? '---' : $items->keterangan}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection