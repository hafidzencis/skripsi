@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Angsuran </h1>
    </div>


    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('angsuran-createOnePost')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="user_id"> Nama </label>
                    <select name="user_id" id="user_id" class="form-control">
                    @foreach ( $Users as $user)
                        <option value="{{ $user->id }}"> {{$user->nama}}</option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block"> Lanjut </button>

            </form>
        </div>
    </div>
</div>
@endsection