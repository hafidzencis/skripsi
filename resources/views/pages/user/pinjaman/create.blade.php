@extends('layouts.user')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pinjaman </h1>
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
            <form action="{{ route('pinjaman-createOnePost-user')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id"> Nama </label>
                    <input type="hidden"  class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->id}}" >
                    <input type="text" readonly class="form-control"  id="user_id" value="{{ Auth::user()->nama}}" >
                </div>
                <div class="form-group">
                    <label for="nominal_pinjaman"> Nominal Pinjaman </label>
                    <input type="text"  class="form-control" name="nominal_pinjaman" id="nominal_pinjaman" value="" placeholder="Masukkan nominal_pinjaman....">
                </div>
                
                <div class="form-group">
                    <label for="jasa"> Jasa </label>
                    <input type="text"  class="form-control" name="jasa" id="jasa" value="2" placeholder="nominal_pinjaman">
                </div>
                <div class="form-group">
                    <label for="tenor"> Tenor </label>
                    <select name="tenor" id="tenor" class="form-control">
                        <option value="">===DI ISI===</option>
                        <option value="12">1 Tahun / 12 Bulan</option>
                        <option value="24">2 Tahun / 24 Bulan</option>  
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block"> Next </button>
            </form>
        </div>
    </div>
</div>
@endsection