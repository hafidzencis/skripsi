<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            table, th, td {
                border:1px solid black;
                font-size: 10px;
            }   

            h1{
                text-align: center;
            }
            td {
                text-align: center;
                
            }
        </style>
        <title>Semua Pinjaman</title>
    </head>
    <body>
        <h1> Semua Pinjaman Lunas</h1>

        <table  width="100%" cellspacing="1"  cellpadding="5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Peminjam</th>
                    <th>Nominal Pinjaman</th>
                    <th> Pinjaman Dibuat</th>
                    <th>Jasa</th>
                    <th>Tenor</th>
                    <th>Biaya Administrasi</th>
                    <th>Apakah Disetujui</th>
                    <th> Tanggal Acc Pinjaman </th>
                    <th> Tanggal Pembayaran Administrasi</th>
                    <th> Tanggal Lunas </th>
                    <th>Status</th>
                    <th>Tipe Pembayaran</th>
                    <th>Biaya Admin</th>
                    <th>Total Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_lunas = 0; ?>
                @forelse ($item_lunas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->users->nama}}</td>
                    <td>@currency($item->nominal_pinjaman)</td>
                    <td>{{$item->created_at->format('Y-m-d')}}</td>
                    <td>{{ $item->jasa}} %</td>
                    <td>{{ $item->tenor/12}} Tahun</td>
                    <td>@currency($item->administrasi)</td>
                    <td>{{ $item->setuju ==  null ? 'Belum disetujui' : ($item->setuju == 1 ? 'Setuju' : 'Tidak Setuju' )}}</td>
                    <td>{{ $item->tanggal_acc_pinjaman == null ? '---' : $items->tanggal_acc_pinjaman}}</td>
                    <td>{{ $item->tanggal_pembayaran_administrasi == null ? '---' : $item->tanggal_pembayaran_administrasi}}</td>
                    <td>{{ $item->tanggal_lunas == null ? '---' : $items->tanggal_lunas}}</td>
                    <td>{{ $item->status}}</td>
                    <td> {{ $item->tipe_pembayaran}}</td>
                    <td>
                        @if ($item->total_transaction == null)
                            ---
                        @else
                            @currency($item->total_transaction - $item->administrasi)
                        @endif
                    </td>
                    <td>
                        @if ( $item->total_transaction == null)
                            ---
                        @else
                            @currency($item->total_transaction)
                        @endif
                    </td>
                    <td>{{ $item->keterangan == null ? '---' : $item->keterangan}}</td>
                
                </tr>
                <?php $total_lunas += $item->nominal_pinjaman ?>
                @empty
                <tr>
                    <td colspan="16">
                        Data Kosong
                    </td>
                </tr>
                @endforelse
                @if ($total_lunas > 0)
                <tr>
                    <td colspan="1">Total Pinjaman</td>
                    <td colspan="15"> @currency($total_lunas)</td>
                </tr>
                @endif
                </tbody>
                
        </table>

        <br>
        <br>
        <br>

        <h1> Semua Pinjaman Selama Mengangsur</h1>

        <table  width="100%" cellspacing="1"  cellpadding="5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Peminjam</th>
                    <th>Nominal Pinjaman</th>
                    <th> Pinjaman Dibuat</th>
                    <th>Jasa</th>
                    <th>Tenor</th>
                    <th>Biaya Administrasi</th>
                    <th>Apakah Disetujui</th>
                    <th> Tanggal Acc Pinjaman </th>
                    <th> Tanggal Pembayaran Administrasi</th>
                    <th> Tanggal Lunas </th>
                    <th>Status</th>
                    <th>Tipe Pembayaran</th>
                    <th>Biaya Admin</th>
                    <th>Total Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_ngangsur = 0; ?>
                @forelse ($item_ngangsur as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->users->nama}}</td>
                    <td>@currency($item->nominal_pinjaman)</td>
                    <td>{{$item->created_at->format('Y-m-d')}}</td>
                    <td>{{ $item->jasa}} %</td>
                    <td>{{ $item->tenor / 12}} Tahun</td>
                    <td>@currency($item->administrasi)</td>
                    <td>{{ $item->setuju ==  null ? 'Belum disetujui' : ($item->setuju == 1 ? 'Setuju' : 'Tidak Setuju' )}}</td>
                    <td>{{ $item->tanggal_acc_pinjaman == null ? '---' : $item->tanggal_acc_pinjaman}}</td>
                    <td>{{ $item->tanggal_pembayaran_administrasi == null ? '---' : $item->tanggal_pembayaran_administrasi}}</td>
                    <td>{{ $item->tanggal_lunas == null ? '---' : $items->tanggal_lunas}}</td>
                    <td>{{ $item->status}}</td>
                    <td> {{ $item->tipe_pembayaran}}</td>
                    <td>
                        @if ($item->total_transaction == null)
                            ---
                        @else
                            @currency($item->total_transaction - $item->administrasi)
                        @endif
                    </td>
                    <td>
                        @if ( $item->total_transaction == null)
                            ---
                        @else
                            @currency($item->total_transaction)
                        @endif
                    </td>
                    <td>{{ $item->keterangan == null ? '---' : $item->keterangan}}</td>
                
                </tr>
                <?php $total_ngangsur += $item->nominal_pinjaman ?>
                @empty
                <tr>
                    <td colspan="16">
                        Data Kosong
                    </td>
                </tr>
                @endforelse

                @if ($total_ngangsur > 0)
                <tr>
                    <td colspan="1">Total Pinjaman</td>
                    <td colspan="15"> @currency($total_ngangsur)</td>
                </tr>
                @endif
                </tbody>
                
        </table>
    </body>
</html>
