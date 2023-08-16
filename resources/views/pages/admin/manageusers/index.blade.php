@extends('layouts.admin-table')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manage Users</h1>

    <div class="mb-4"></div>

    @if(session()->has('successResetPassword'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('successResetPassword')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>No HP</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Bank</th>
                                <th>Foto 3x4</th>
                                <th>Foto KTP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$item->nama}} </td>
                                    <td> {{$item->nik}}</td>
                                    <td> {{$item->no_hp}}</td>
                                    <td> {{$item->tempat_lahir}}</td>
                                    <td> {{$item->tanggal_lahir}}</td>
                                    <td> {{$item->alamat}}</td>
                                    <td>{{$item->bank == null ? '---' :  $item->bank}}</td>
                                    <td><img src="{{ Storage::url($item->image_3x4)}}" 
                                        style="width: 400px;" class="img-thumbnail"
                                    alt="{{$item->image_3x4}}"></td>
                                    <td><img src="{{ Storage::url($item->image_ktp)}}" 
                                        style="width: 400px;" class="img-thumbnail"
                                    alt="{{$item->image_ktp}}"></td>
                                    <td class="d-inline-flex py-3">
                                        <a href="{{ route('usermanages.edit',$item->id) }}" class="btn btn-primary mr-2">
                                            <i class="fa fa-eye"></i>
                                            Reset Password
                                        </a>
                                        
                                    
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$item->id}}">
                                            <i class="fa fa-trash"></i>
                                            Hapus Akun
                                        </button>
                                        </form>
                                        <div class="modal fade" id="deleteModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin menghapus semua data {{ $item->nama}} ?</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Apabila ingin menghapus klik tombol 'Delete' </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('usermanages.destroy',$item->id)}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-primary" type="submit">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>


                            @endforeach
                        </tbody>

                    </table>
                
            </div>
        </div>
    </div>
</div>
@endsection