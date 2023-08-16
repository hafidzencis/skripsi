@extends('layouts.user')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pinjaman </h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">

                    <tr>
                        <th>Nama</th>
                        <td>{{ $items->users->nama}}</td>
                    </tr>

                    <tr>
                        <th>Nominal Pinjaman</th>
                        <td> @currency($items->nominal_pinjaman) </td>

                    </tr>

                    <tr>
                        <th> Pinjaman Dibuat</th>
                        <td>{{$items->created_at->format('Y-m-d')}}</td>
                    </tr>

                    <tr>
                        <th>Jasa</th>
                        <td>{{ $items->jasa}}%</td>
                    </tr>

                    <tr>
                        <th>Tenor</th>
                        <td>{{ $items->tenor / 12 }} Tahun</td>
                    </tr>

                    <tr>
                        <th> Biaya Administrasi</th>
                        <td> @currency($items->administrasi) </td>
                    </tr>

                    <tr>
                        <th>Apakah Disetujui</th>
                        <td>{{ $items->setuju ==  null ? 'Belum disetujui' : ($items->setuju == 1 ? 'Setuju' : 'Tidak Setuju' )}}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Acc Pinjaman</th>
                        <td>{{ $items->tanggal_acc_pinjaman == null ? '---' : $items->tanggal_acc_pinjaman}}</td>
                    </tr>

                    <tr>
                        <th> Tanggal Pembayaran Administrasi</th>
                        <td>{{ $items->tanggal_pembayaran_administrasi == null ? '---' : $items->tanggal_pembayaran_administrasi}}</td>
                    </tr>
                    
                    <tr>
                        <th>Tanggal Lunas</th>
                        <td>{{ $items->tanggal_lunas == null ? '---' : $items->tanggal_lunas}}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{ $items->status}}</td>
                    </tr>

                    <tr>
                        <th> Tipe Pembayaran</th>
                        <td>{{ $items->tipe_pembayaran }}</td>
                    </tr>

                    <tr>
                        <th> Biaya Admin </th>
                        <td>
                            @if ($items->total_transaction == null)
                            ---
                            @else
                                @currency($items->total_transaction - $items->administrasi)
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th> Total Transaction </th>
                        <td> 
                            @if ( $items->total_transaction == null)
                                ---
                            @else
                                @currency($items->total_transaction)
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th> Keterangan</th>
                        <td>{{ $items->keterangan == null ? '---' : $items->keterangan}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection