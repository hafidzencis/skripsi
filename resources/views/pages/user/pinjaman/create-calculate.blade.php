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
            <form action="{{ route('pinjaman-createTwoPost-user')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="administrasi"> Administrasi </label>
                    <p style="font-size:15px;color:blue">* Biaya adminitrasi 0,5 % X Nominal Pinjaman</p>
                    <input type="text"  class="form-control" name="administrasi" id="administrasi" value="{{ 0.005 * $createPinjamanUser['nominal_pinjaman']}}" placeholder="title">
                </div> 

                <div class="form-group">
                    <input type="hidden"  class="form-control" name="status" id="status" value="PENDING" >
                </div>
                
                <div class="form-group">
                    <label for="tipe_pembayaran">Tipe Pembayaran</label>
                    <input type="text" readonly name="tipe_pembayaran" id="tipe_pembayaran" class="form-control" value="TRANSFER">
                </div>

                <div class="form-group">
                    <label for="keterangan"> Keterangan (BOLEH DIISI BOLEH TIDAK) </label>
                    <input type="text"  class="form-control" name="keterangan" id="keterangan" value="" placeholder="Masukkan keterangan...">
                </div>                            
                <button type="submit" class="btn btn-primary btn-block"> Next </button>

            </form>
        </div>
    </div>
</div>
@endsection