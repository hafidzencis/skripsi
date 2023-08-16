@extends('layouts.admin-table')


@section('content')
<div class="container-fluid">


    <h1 class="h3 mb-2 text-gray-800">Simpanan</h1>

    @if(session()->has('noCreateSimpananWajib'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('noCreateSimpananWajib')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session()->has('existsSimpananWajib'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('existsSimpananWajib')}}
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
        
    <a href="{{ route('simpanan-create-find') }}" class="btn btn-sm btn-primary shadow-sm mb-4"><i
        class="fas fa-download fa-sm text-white-50"></i> Menambah Simpanan
    </a>
    <a href="{{ route('simpanan-laporan') }}" class="btn btn-sm btn-primary shadow-sm mb-4"><i
        class="fas fa-download fa-sm text-white-50"></i> Lihat Laporan
    </a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($result as $item)
                            <tr>
                                <td>{{ $loop->iteration}}    </td>
                                <td>{{ $item->users->nama }}</td>
                                <td> @currency($item->nominal_simpanan) </td>
                                <td>{{ $item->type_deposits->nama_tipe_deposit}}</td>
                                <td>{{$item->created_at->format('Y-m-d')}}</td>
                                <td>{{ $item->status}}</td>
                                <td>{{ $item->tanggal_membayar == null ? '---' :  $item->tanggal_membayar}}</td>
                                <td>{{ $item->tipe_pembayaran}}</td>
                                <td>{{ $item->keterangan == null ? '---' : $item->keterangan}}</td>
                                <td class="d-inline-flex py-">
                                    <a href="{{ route('simpanan-detail',$item->id)}}" class="btn btn-primary mr-2">
                                        <i class="fa fa-eye"></i>
                                        Detail
                                    </a>
                                    <a href="{{ route('simpanan-edit',$item->id)}} " class="btn btn-info mr-2">
                                        <i class="fa fa-pencil-alt"></i>
                                        Ubah
                                    </a>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$item->id}}" >
                                        <i class="fa fa-trash"></i>
                                        Hapus
                                    </button>
                                    <div class="modal fade" id="deleteModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin menghapus Simpanan ini ?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Apabila ingin menghapus klik tombol 'Delete' </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('simpanan-destroy',$item->id)}} " method="post">
                                                        @csrf
                                                        @method('delete')
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary" type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

