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
        <title>Semua Simpanan</title>
    </head>
    <body>
        <h1> Semua Simpanan </h1>

        <table  width="100%" cellspacing="1"  cellpadding="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Nominal Simpanan</th>
                    <th>Tipe Simpanan</th>
                    <th>Simpanan Dibuat</th>
                    <th>Status</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Tipe Pembayaran</th>
                    <th>Biaya Admin</th>
                    <th>Total Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_all = 0; ?>
                @forelse ($itemsSimpanan as $item)
                    <tr>
                        <td>{{ $loop->iteration}}    </td>
                        <td>{{ $item->users->nama }}</td>
                        <td> @currency($item->nominal_simpanan)</td>
                        <td>{{ $item->type_deposits->nama_tipe_deposit}}</td>
                        <td>{{$item->created_at->format('Y-m-d')}}</td>
                        <td>{{ $item->status}}</td>
                        <td>{{ $item->tanggal_membayar == null ? '---' : $item->tanggal_membayar }}</td>
                        <td>{{ $item->tipe_pembayaran}}</td>
                        <td> @if ($item->total_transaction == null)
                                ---
                            @else
                                @currency($item->total_transaction - $item->nominal_simpanan)    
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
                <?php $total_all += $item->nominal_simpanan ?>
                @empty
                <tr>
                    <td colspan="11">
                        Data Kosong
                    </td>
                </tr>
                @endforelse

                @if ($total_all > 0)
                <tr>
                    <td colspan="1">Total Simpanan</td>
                    <td colspan="10"> @currency($total_all)</td>
                </tr>
                @endif
            </tbody>
                
        </table>

        <br>
        <br>
        <br>

        <h1> Semua Simpanan Wajib</h1>

        <table  width="100%" cellspacing="1" cellpadding="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Nominal Simpanan</th>
                    <th>Tipe Simpanan</th>
                    <th>Simpanan Dibuat</th>
                    <th>Status</th>
                    <th>Tanggal Membayar</th>
                    <th>Tipe Pembayaran</th>
                    <th>Biaya Admin</th>
                    <th>Total Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_wjb = 0; ?>
                @forelse ($itemsSimpananWajib as $item)
                    <tr>
                        <td>{{ $loop->iteration}}    </td>
                        <td>{{ $item->users->nama }}</td>
                        <td> @currency($item->nominal_simpanan) </td>
                        <td>{{ $item->type_deposits->nama_tipe_deposit}}</td>
                        <td>{{$item->created_at->format('Y-m-d')}}</td>
                        <td>{{ $item->status}}</td>
                        <td>{{ $item->tanggal_membayar == null ? '---' : $item->tanggal_membayar }}</td>
                        <td>{{ $item->tipe_pembayaran}}</td>
                        <td> @if ($item->total_transaction == null)
                                ---
                            @else
                                @currency($item->total_transaction - $item->nominal_simpanan)    
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
                <?php $total_wjb += $item->nominal_simpanan ?>
                @empty
                <tr>
                    <td colspan="11">
                        Data Kosong
                    </td>
                </tr>
                @endforelse

                @if ($total_wjb > 0)
                <tr>
                    <td colspan="1">Total Simpanan</td>
                    <td colspan="10"> @currency($total_wjb)</td>
                </tr>
                @endif
            </tbody>
                
        </table>


        <br>
        <br>
        <br>

        <h1> Semua Simpanan Pokok</h1>

        <table  width="100%" cellspacing="1"  cellpadding="5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Nominal Simpanan</th>
                    <th>Tipe Simpanan</th>              
                    <th>Simpanan Dibuat</th>
                    <th>Status</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Tipe Pembayaran</th>
                    <th>Biaya Admin</th>
                    <th>Total Pembayaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_pokok = 0; ?>
                @forelse ($itemsSimpananPokok as $item)
                    <tr>
                        <td>{{ $loop->iteration}}    </td>
                        <td>{{ $item->users->nama }} </td>
                        <td> @currency($item->nominal_simpanan) </td>
                        <td>{{ $item->type_deposits->nama_tipe_deposit}}</td>
                        <td>{{$item->created_at->format('Y-m-d')}}</td>
                        <td>{{ $item->status}}</td>
                        <td>{{ $item->tanggal_membayar == null ? '---' : $item->tanggal_membayar }}</td>
                        <td>{{ $item->tipe_pembayaran}}</td>
                        <td> @if ($item->total_transaction == null)
                                ---
                            @else
                                @currency($item->total_transaction - $item->nominal_simpanan)    
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
                <?php $total_pokok += $item->nominal_simpanan ?>
                @empty
                <tr>
                    <td colspan="11">
                        Data Kosong
                    </td>
                </tr>
                @endforelse

                @if ($total_pokok > 0)
                <tr>
                    <td colspan="1">Total Simpanan</td>
                    <td colspan="10"> @currency($total_pokok) </td>
                </tr>
                @endif
            </tbody>
                
        </table>
    </body>
</html>
