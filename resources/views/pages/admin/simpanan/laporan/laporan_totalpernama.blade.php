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
        <title>Semua Simpanan</title>
    </head>
    <body>
        <h1> Semua Total Simpanan </h1>

        <table  width="100%" cellspacing="1"  cellpadding="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Total Simpanan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_all = 0; ?>
                @forelse ($itemsSimpanan as $item)
                    <tr>
                        <td>{{ $loop->iteration}}    </td>
                        <td>{{ $item->nama }}</td>
                        <td> @currency($item->total_simpanan)</td>
                        <td>LUNAS</td>
                    </tr>
                <?php $total_all += $item->total_simpanan ?>
                @empty
                <tr>
                    <td colspan="4">
                        Data Kosong
                    </td>
                </tr>
                @endforelse

                @if ($total_all > 0)
                <tr>
                    <td colspan="1">Total Seluruh Simpanan</td>
                    <td colspan="3"> @currency($total_all)</td>
                </tr>
                @endif
            </tbody>
                
        </table>
            </tbody>
                
        </table>
    </body>
</html>
