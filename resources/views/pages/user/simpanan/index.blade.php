@extends('layouts.user')


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

    <a href="{{ route('simpanan-user-create') }}" class="btn btn-sm btn-primary shadow-sm mb-4"><i
        class="fas fa-download fa-sm text-white-50"></i> Menambah Simpanan
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
                            <th>Tipe Pembayaran</th>
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
                                <td>{{ $item->tipe_pembayaran}}</td>
                                <td class="d-inline-flex py-">
                                    <a href="{{ route('simpanan-user-detail',$item->id )}}" class="btn btn-primary mr-2">
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

