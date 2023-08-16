@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Angsuran </h1>
    </div>


    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('angsuran-update',$item->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="user_id"> Nama </label>
                    <input type="text"  readonly class="form-control" name="user_id" id="user" value="{{ $item->users->nama}}" disabled>
                </div>

                <div class="form-group">
                    <label for="type_installment_id"> Tipe Angsuran </label>
                    <input type="text"  readonly  class="form-control" name="type_installment_id" id="type_installment_id" value="{{$item->type_installments->nama_tipe_angsuran}}" disabled>
                </div>

                <div class="form-group">
                    <label for="nominal_pinjaman"> Nominal Pinjaman </label>
                    <input type="text"  readonly class="form-control" name="nominal_pinjaman" id="nominal_pinjaman" value="{{$item->loans->nominal_pinjaman}}" disabled>
                </div>

                <div class="form-group">
                    <label for="nominal_angsuran"> Nominal Angsuran </label>
                    <input type="text" readonly class="form-control" name="nominal_angsuran" id="nominal_angsuran" value="{{ $item->nominal_angsuran   }}" >
                </div>

                <div class="form-group">
                    <label for="angsuran_ke"> Angsuran Ke  </label>
                    <input type="text" readonly class="form-control" name="angsuran_ke" id="angsuran_ke" value="{{ $item->angsuran_ke }}" >
                </div>

                <div class="form-group">
                    <label for="tanggal_pembayaran"> Tanggal Pembayaran </label>
                    <input type="date"  class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" value="{{ $item->tanggal_pembayaran}}" >
                </div>
                
                <div class="form-group">
                    <label for="status"> Status </label>
                    <select name="status" id="status" class="form-control">
                        <option value="PENDING" {{ $item->status == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                        <option value="GAGAL" {{ $item->status == 'GAGAL' ? 'selected' : '' }}>GAGAL</option>
                        <option value="LUNAS"{{ $item->status == 'LUNAS' ? 'selected' : '' }}>LUNAS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tipe_pembayaran">Tipe Pembayaran</label>
                    <select name="tipe_pembayaran" id="tipe_pembayaran" name="tipe_pembayaran" class="form-control">
                        <option value="DITEMPAT" {{ $item->tipe_pembayaran == 'DITEMPAT' ? 'selected' : ' '}} >DITEMPAT</option>
                        <option value="TRANSFER" {{ $item->tipe_pembayaran == 'TRANSFER' ? 'selected' : ' '}} >TRANSFER</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan"> Keterangan (Boleh Diisi Atau Tidak) </label>
                    <input type="text"  class="form-control" name="keterangan" id="keterangan" value="{{ $item->keterangan }}" placeholder="Masukkan keterangan">
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Tambah </button>

            </form>
        </div>
    </div>
</div>
@endsection