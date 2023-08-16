@extends('layouts.user')

@section('content')
<div class="container-fluid ">

    <h1 class="h3 mb-2 text-gray-800">Data Diri</h1>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <a href="{{ route('ubahdatadiri-user-edit')}}" class="btn btn-sm btn-primary shadow-sm mb-4"><i
        class="fas fa-download fa-sm text-white-50"></i> Ubah Data Diri
    </a>
    <a href="{{ route('ubahdatadiri-user-editchangepassword')}}" class="btn btn-sm btn-primary shadow-sm mb-4"><i
        class="fas fa-download fa-sm text-white-50"></i> Ganti Password
    </a>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th style="width: 500px;" >Nama</th>
                            <td>{{ $item->nama}}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td> {{ $item->nik}} </td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td> {{ $item->no_hp}} </td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td> {{ $item->tempat_lahir}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td> {{ $item->tanggal_lahir}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td> {{ $item->alamat}}</td>
                        </tr>
                        <tr>
                            <th>Bank</th>
                            <td> {{ $item->bank == null ? '---' :  $item->bank }}</td>
                        </tr>
                        <tr>
                            <th>No Hp</th>
                            <td> {{ $item->no_hp}}</td>
                        </tr>
                        <tr>
                            <th>Foto 3x4</th>
                            <td><img src="{{ Storage::url($item->image_3x4)}}" 
                                style="width: 150px;" class="img-thumbnail"
                            alt="{{$item->image_3x4}}"></td>
                        </tr>
                        <tr>
                            <th>Foto KTP</th>
                            <td><img src="{{ Storage::url($item->image_ktp)}}" 
                                style="width: 150px;" class="img-thumbnail"
                            alt="{{$item->image_ktp}}"></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection