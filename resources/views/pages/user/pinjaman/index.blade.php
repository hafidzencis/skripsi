@extends('layouts.user')


@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Mengajukan Pinjaman</h1>
    <a href="{{ route('pinjaman-createOne-user')}}" class="btn btn-sm btn-primary shadow-sm mb-4"><i
        class="fas fa-download fa-sm text-white-50"></i> Mengajukan Pinjaman
    </a>
    
    @if(session()->has('noCreateSimpananWajib'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('noCreateSimpananWajib')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session()->has('noCreateSimpananPokok'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('noCreateSimpananPokok')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session()->has('user_exists'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('user_exists')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nominal Pinjaman</th>
                            <th>Nama Peminjam</th>
                            <th>Jasa</th>
                            <th>Tenor</th>
                            <th>Administrasi</th>
                            <th>Disetujui</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->users->nama}}</td>
                            <td> @currency($item->nominal_pinjaman) </td>
                            <td>{{ $item->jasa}} %</td>
                            <td>{{ $item->tenor/ 12}} Tahun</td>
                            <td>{{ $item->administrasi}}</td>
                            <td>{{ $item->setuju ==  null ? 'Belum disetujui' : ($item->setuju == 1 ? 'Setuju' : 'Tidak Setuju' )}}</td>
                            <td>{{ $item->status}}</td>
                            <td class="d-inline-flex py-">
                                <a href="{{ route('pinjaman-detail-user',$item->id )}}" class="btn btn-primary mr-2">
                                    <i class="fa fa-eye"></i>
                                    Detail
                                </a>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                Data Kosong
                            </td>
                        </tr> 
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection