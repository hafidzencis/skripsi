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
                <form action="{{route('simpanan-create-type-post')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="nominal_simpanan"> Nominal Simpanan</label>
                        <input type="text" readonly class="form-control" name="nominal_simpanan" id="nominal_simpanan" value="{{ $nominal_simpanan}}" placeholder="Masukkan Nominal simpanan....">
                    </div>
    
                    <div class="form-group">
                        <label for="status"> Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value=""> ===DIISI===</option>
                            <option value="PENDING">PENDING</option>
                            <option value="GAGAL">GAGAL</option>
                            <option value="LUNAS">LUNAS</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="tanggal_membayar"> Tanggal Pembayaran </label>
                        <input type="date"  class="form-control" name="tanggal_membayar" id="tanggal_membayar" value="{{ old('tanggal_membayar')}}" placeholder="Masukkan tanggal...">
                    </div>

                    <div class="form-group">
                        <label for="tipe_pembayaran">Tipe Pembayaran</label>
                        <select name="tipe_pembayaran" id="tipe_pembayaran" class="form-control">
                            <option value=""> ===DIISI===</option>
                            <option value="DITEMPAT">DITEMPAT</option>
                            <option value="TRANSFER">TRANSFER</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="keterangan"> Keterangan (BOLEH TIDAK DIISI)</label>
                        <input type="text"  class="form-control" name="keterangan" id="keterangan" value="{{ old('keterangan')}}" placeholder="Masukkan keterangan....">
                    </div>
                <button type="submit" class="btn btn-primary btn-block"> Tambah </button>

            </form>
        </div>
    </div>
</div>
@endsection