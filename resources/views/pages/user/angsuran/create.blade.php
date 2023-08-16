@extends('layouts.user')

@section('content')
<div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Angsuran </h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('angsuran-createOnePost-user')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="user_id"> Nama </label>
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id}}">
                    <input type="text" readonly id="user_id" value="{{ Auth::user()->nama}}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block"> Lanjut </button>

            </form>
        </div>
    </div>
</div>
@endsection