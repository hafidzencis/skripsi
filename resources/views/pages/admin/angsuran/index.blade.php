@extends('layouts.admin-table')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Angsuran</h1>
    <a href="{{ route('angsuran-createOne')}}" class="btn btn-sm btn-primary shadow-sm mb-4"><i
        class="fas fa-download fa-sm text-white-50"></i> Membayar Angsuran
    </a>
    <a href="{{ route('angsuran-laporan-index')}}" class="btn btn-sm btn-primary shadow-sm mb-4" ><i
        class="fas fa-download fa-sm text-white-50"></i> Lihat Laporan
    </a>


    @if(session()->has('createAngsuranError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('createAngsuranError')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    @if(session()->has('add-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('add-success')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session()->has('update-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('update-success')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session()->has('delete-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('delete-success')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="5">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Nominal Pinjaman</th>
                            <th>Tipe Angsuran</th>
                            <th>Nominal Angsuran</th>
                            <th>Angsuran ke</th>
                            <th>Tenor</th>
                            <th>Status</th>
                            <th>Tipe Pembayaran</th>
                            <th>Nominal Kurangnya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>

                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->users->nama}}</td>
                            <td> @currency($item->loans->nominal_pinjaman)</td>
                            <td>{{ $item->type_installments->nama_tipe_angsuran}}</td>
                            <td>@currency($item->nominal_angsuran)</td>
                            <td>{{ $item->angsuran_ke}}</td>
                            <td>{{ $item->loans->tenor / 12}} Tahun</td>
                            <td>{{ $item->status}}</td>
                            <td>{{ $item->tipe_pembayaran}}</td>
                            <td>
                                @if ($item->type_installments->nama_tipe_angsuran == 'Angsuran Pokok')
                                    @currency($item->nominal_hasil)
                                @endif

                                @if ($item->type_installments->nama_tipe_angsuran == 'Angsuran Jasa')
                                    @currency($item->nominal_hasil)
                                @endif
                                
                                @if($item->type_installments->nama_tipe_angsuran == null)
                                ---
                                @endif
                            </td>
                            <td class="d-inline-flex py-">
                                <a href="{{ route('angsuran-detail',$item->id )}}" class="btn btn-primary mr-2">
                                    <i class="fa fa-eye"></i>
                                    Detail
                                </a>
                                <a href="{{ route('angsuran-edit',$item->id)}} " class="btn btn-info mr-2">
                                    <i class="fa fa-pencil-alt"></i>
                                    Ubah
                                </a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$item->id}}" >
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin menghapus Angsuran ini ?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apabila ingin menghapus klik tombol 'Delete'</div>
                                    <div class="modal-footer">
                                        <form action="{{ route('angsuran-destroy',$item->id)}} " method="post">
                                        @csrf
                                        @method('delete')
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-primary" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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

