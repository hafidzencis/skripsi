<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            table, th, td {
                border:1px solid black;
                font-size: 12px;
            }   

            h1{
                text-align: center;
            }
            td {
                text-align: center;
            }
        </style>
        <title>Semua Angsuran</title>
    </head>
    <body>

        <h1> Semua Angsuran </h1>

        <table  width="100%" cellspacing="1"  cellpadding="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Nominal Pinjaman</th>
                    <th>Tipe Angsuran</th>
                    <th>Nominal Angsuran</th>
                    <th>Angsuran ke</th>
                    <th> Angsuran Dibuat</th>
                    <th>Tenor</th>
                    <th>Status</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Tipe Pembayaran</th>
                    <th>Biaya Admin</th>
                    <th>Total Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_ap = 0; ?>
                @forelse ($itemsAll as $item)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $item->users->nama}}</td>
                    <td>@currency($item->loans->nominal_pinjaman)</td>
                    <td>{{ $item->type_installments->nama_tipe_angsuran}}</td>
                    <td>@currency($item->nominal_angsuran)</td>
                    <td>{{ $item->angsuran_ke}}</td>
                    <td>{{$item->created_at->format('Y-m-d')}}</td>
                    <td>{{ $item->loans->tenor / 12}} Tahun</td>
                    <td>{{ $item->status}}</td>
                    <td>{{ $item->tanggal_pembayaran == null ? '---' : $item->tanggal_pembayaran }}</td>
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
                <?php $total_ap += $item->nominal_angsuran ?>
                @empty
                <tr>
                    <td colspan="13">
                        Data Kosong
                    </td>
                </tr>
                @endforelse
                @if ($total_ap > 0)
                    <tr>
                        <td colspan="1">Total Angsuran</td>
                        <td colspan="12"> {{ $total_ap }}</td>
                    </tr>
                @endif
                
            </tbody>
                
        </table>

        <br>
        <br>
        <br>

        <h1> Semua Angsuran Lunas Filter dengan Angsuran Pokok</h1>

        <table  width="100%" cellspacing="1"  cellpadding="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Nominal Pinjaman</th>
                    <th>Tipe Angsuran</th>
                    <th>Nominal Angsuran</th>
                    <th>Angsuran ke</th>
                    <th> Angsuran Dibuat</th>
                    <th>Tenor</th>
                    <th>Status</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Tipe Pembayaran</th>
                    <th>Biaya Admin</th>
                    <th>Total Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_ap = 0; ?>
                @forelse ($itemsPokok as $item)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $item->users->nama}}</td>
                    <td>@currency($item->loans->nominal_pinjaman)</td>
                    <td>{{ $item->type_installments->nama_tipe_angsuran}}</td>
                    <td>@currency($item->nominal_angsuran)</td>
                    <td>{{ $item->angsuran_ke}}</td>
                    <td>{{$item->created_at->format('Y-m-d')}}</td>
                    <td>{{ $item->loans->tenor / 12}} Tahun</td>
                    <td>{{ $item->status}}</td>
                    <td>{{ $item->tanggal_pembayaran == null ? '---' : $item->tanggal_pembayaran }}</td>
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
                <?php $total_ap += $item->nominal_angsuran ?>
                @empty
                <tr>
                    <td colspan="13">
                        Data Kosong
                    </td>
                </tr>
                @endforelse
                @if ($total_ap > 0)
                    <tr>
                        <td colspan="1">Total Angsuran Pokok</td>
                        <td colspan="12"> @currency($total_ap)</td>
                    </tr>
                @endif
                
            </tbody>
                
        </table>

        <br>
        <br>
        <br>

        <h1> Semua Angsuran Lunas Filter dengan Angsuran Pokok</h1>

        <table  width="100%" cellspacing="1"  cellpadding="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Nominal Pinjaman</th>
                    <th>Tipe Angsuran</th>
                    <th>Nominal Angsuran</th>
                    <th>Angsuran ke</th>
                    <th> Angsuran Dibuat</th>    
                    <th>Tanggal Pembayaran</th>
                    <th>Tenor</th>
                    <th>Status</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Tipe Pembayaran</th>
                    <th>Biaya Admin</th>
                    <th>Total Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_aj = 0; ?>
                @forelse ($itemsJasa as $item)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $item->users->nama}}</td>
                    <td>@currency($item->loans->nominal_pinjaman)</td>
                    <td>{{ $item->type_installments->nama_tipe_angsuran}}</td>
                    <td>@currency($item->nominal_angsuran)</td>
                    <td>{{ $item->angsuran_ke}}</td>
                    <td>{{$item->created_at->format('Y-m-d')}}</td>
                    <td>{{ $item->loans->tenor / 12}} Tahun</td>
                    <td>{{ $item->status}}</td>
                    <td>{{ $item->tanggal_pembayaran == null ? '---' : $item->tanggal_pembayaran }}</td>
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
                <?php $total_aj += $item->nominal_angsuran ?>
                @empty
                <tr>
                    <td colspan="13">
                        Data Kosong
                    </td>
                </tr>
                @endforelse
                @if ($total_aj > 0)
                    <tr>
                        <td colspan="1">Total Angsuran Jasa</td>
                        <td colspan="12"> @currency($total_aj) </td>
                    </tr>
                @endif
                
            </tbody>
                
        </table>
    </body>
</html>
