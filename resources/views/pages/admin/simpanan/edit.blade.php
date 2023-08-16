@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Simpanan </h1>
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{route('simpanan-update',$items->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="user_id"> Nama </label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ( $all_user as $item_user)
                        <option value="{{ $item_user->id }}" {{$item_user->nama == $user->nama ? 'selected' : ''}}> {{$item_user->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type_deposit_id"> Tipe Simpanan </label>
                    <select name="type_deposit_id" id="type_deposit_id" class="form-control">
                    @foreach ( $all_type_deposit as $item_typedepo)
                        <option value="{{ $item_typedepo->id }}" {{ $type_depo->id == $item_typedepo->id ? 'selected' : ''}}> {{$item_typedepo->nama_tipe_deposit}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nominal_simpanan"> Nominal Simpanan</label>
                    <input type="text"  class="form-control" name="nominal_simpanan" id="nominal_simpanan" value="{{ $items->nominal_simpanan}}" placeholder="Nominal simpanan....">
                </div>

                <div class="form-group">
                    <label for="status"> Status </label>
                    <select name="status" id="status" class="form-control">
                        <option value="PENDING" {{$items->status == 'PENDING' ? 'selected' : ''}}>PENDING</option>
                        <option value="GAGAL" {{$items->status == 'GAGAL' ? 'selected' : ''}}>GAGAL</option>
                        <option value="LUNAS" {{$items->status == 'LUNAS' ? 'selected' : ''}}>LUNAS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_membayar"> Tanggal Membayar </label>
                    <input type="date"  class="form-control" name="tanggal_membayar" id="tanggal_membayar" value="{{ $items->tanggal_membayar}}" placeholder="tanggal...">
                </div>

                <div class="form-group">
                    <label for="tipe_pembayaran">Tipe Pembayaran</label>
                    <select name="tipe_pembayaran" id="tipe_pembayaran" class="form-control">
                        <option value="DITEMPAT" {{ $items->tipe_pembayaran == 'DITEMPAT' ? 'selected' : ''}} >DITEMPAT</option>
                        <option value="TRANSFER" {{ $items->tipe_pembayaran == 'TRANSFER' ? 'selected' : ''}} >TRANSFER</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan"> Keterangan (BOLEH TIDAK DIISI)</label>
                    <input type="text"  class="form-control" name="keterangan" id="keterangan" value="{{ $items->keterangan}}" placeholder="keterangan....">
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Tambah </button>

            </form>
        </div>
    </div>
</div>
@endsection