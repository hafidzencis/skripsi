@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Simpanan</h1>
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
    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-body">

     
                <form action="{{route('simpanan-user-create-type-post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nominal_simpanan"> Nominal Simpanan</label>
                        <input type="text" readonly class="form-control" name="nominal_simpanan" id="nominal_simpanan" value="{{ $nominal_simpanan}}">
                    </div>
    
                    <div class="form-group">
                        <input type="hidden"  class="form-control" name="status" id="status" value="PENDING" >
                    </div>
    
                    <div class="form-group">
                        <label for="tipe_pembayaran">Tipe Pembayaran</label>
                        <input type="text" readonly name="tipe_pembayaran" id="tipe_pembayaran" class="form-control" value="TRANSFER">
                    </div>
    
                    <div class="form-group">
                        <label for="keterangan"> Keterangan (BOLEH TIDAK DIISI)</label>
                        <input type="text"  class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan....">
                    </div>
                <button type="submit" class="btn btn-primary btn-block"> Lanjut</button>

            </form>
        </div>
    </div>
</div>
@endsection