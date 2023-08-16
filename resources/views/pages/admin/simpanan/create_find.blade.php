@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Simpanan </h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
                <form action="{{route('simpanan-create-find-post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="user_id"> Nama </label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="">===DI ISI===</option>
                            @foreach ( $users as $user)
                            <option value="{{ $user->id }}"> {{$user->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type_deposit_id"> Tipe Simpanan </label>
                        <select name="type_deposit_id" id="type_deposit_id" class="form-control">
                        <option value="">===DI ISI===</option>
                        @foreach ( $types_deposit as $typedepo)
                            <option value="{{ $typedepo->id }}"> {{$typedepo->nama_tipe_deposit}}</option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> Lanjut </button>
            </form>
        </div>
    </div>
</div>
@endsection