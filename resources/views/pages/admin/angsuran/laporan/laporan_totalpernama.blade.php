<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            table, th, td {
                border:1px solid black;
            }   

            h1{
                text-align: center;
            }
            td {
                text-align: center;
            }
        </style>
        <title>Semua Total Pinjaman </title>
    </head>
    <body>
   
    
        <h1> Semua Total Pinjaman  </h1>

        <table  width="100%" cellspacing="1"  cellpadding="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Nominal Pinjaman</th>
                    <th>Angsuran </th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_all = 0; ?>

                @foreach ($users as $user)

                    @foreach ($itemsAll as $item)

                        @if ($user->id == $item->user_id)
                            <tr>
                                <td> {{ $loop->iteration}}</td>
                                <td>{{ $user->nama}}</td>
                                <td>@currency($item->nominal_pinjaman)</td>
                                <td>@currency($item->total_angsuran) </td>
                                <td>LUNAS</td>
                            </tr>
                            <?php $total_all += $item->total_angsuran ?>
                        @endif
                
                    @endforeach
                    
                @endforeach

                @if ($itemsAll == null)
                    <tr>
                        <td colspan="5">
                            Data Kosong
                        </td>
                    </tr>
                @endif


                @if ($total_all > 0)
                <tr>
                    <td colspan="1">Total Seluruh Angsuran</td>
                    <td colspan="4"> @currency($total_all)</td>
                </tr>
                @endif
            </tbody>
                
        </table>
    </body>
</html>
