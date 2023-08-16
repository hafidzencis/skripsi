@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pinjaman</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('pinjaman-update',$items->id)}}" method="POST">
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
                    <label for="nominal_pinjaman"> Nominal Pinjaman </label>
                    <input type="text"  class="form-control" name="nominal_pinjaman" id="nominal_pinjaman" value="{{ $items->nominal_pinjaman }}" placeholder="Masukkan nominal pinjaman....">
                </div>
                <div class="form-group">
                    <label for="jasa"> Jasa</label>
                    <input type="text"  class="form-control" name="jasa" id="jasa" value="2">
                </div>
                <div class="form-group">
                    <label for="tenor"> Tenor </label>
                    <select name="tenor" id="tenor" class="form-control">
                        <option value="12" {{$items->tenor == 1 ? 'selected' : ''}}>1 Tahun</option>
                        <option value="24" {{$items->tenor == 2 ? 'selected' : ''}}>2 Tahun</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="administrasi"> Administrasi </label>
                    <p style="font-size:15px;color:blue">* Biaya adminitrasi 0,5 % X Nominal Pinjaman</p>
                    <input type="text"  class="form-control" name="administrasi" id="administrasi" value="{{ $items->administrasi }}" placeholder="Masukan Biaya Administrasi....">
                </div>                          
                <div class="form-group">
                    <label for="setuju"> Disetujui </label>
                    <select name="setuju" id="setuju" class="form-control">
                        <option value="0" {{ $items->setuju == '0' ? 'selected' : ''}} >Tidak Setuju</option>
                        <option value="1" {{ $items->setuju == '1' ? 'selected' : ''}}> Setuju</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_acc_pinjaman"> Tanggal Acc Pinjaman </label>
                    <input type="date"  class="form-control" name="tanggal_acc_pinjaman" id="tanggal_acc_pinjaman" value="{{ $items->tanggal_acc_pinjaman}}" placeholder="Masukan tanggal acc pinjaman....">
                </div>
                <div class="form-group">
                    <label for="tanggal_pembayaran_administrasi"> Tanggal Pembayaran Administrasi </label>
                    <input type="date"  class="form-control" name="tanggal_pembayaran_administrasi" id="tanggal_pembayaran_administrasi" value="{{ $items->tanggal_pembayaran_administrasi}}" placeholder="Masukan tanggal ajuan pinjaman.....">
                </div>
                <div class="form-group">
                    <label for="tanggal_lunas"> Tanggal Lunas  </label>
                    <input type="date"  class="form-control" name="tanggal_lunas" id="tanggal_lunas" value="{{ $items->tanggal_lunas}}" placeholder="Masukkan tanggal lunas....">
                </div>

                <div class="form-group">
                    <label for="status"> Status  </label>
                    <select name="status" id="status" class="form-control">
                        <option value="PENDING" {{$items->status == 'PENDING' ? 'selected' : ''}}>PENDING</option>
                        <option value="GAGAL" {{$items->status == 'GAGAL' ? 'selected' : ''}}>GAGAL</option>
                        <option value="MENGANGSUR" {{$items->status == 'MENGANGSUR' ? 'selected' : ''}}>MENGANGSUR</option>
                        <option value="LUNAS" {{$items->status == 'BERHASIL' ? 'selected' : ''}}>LUNAS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tipe_pembayaran">Tipe Pembayaran</label>
                    <select name="tipe_pembayaran" id="tipe_pembayaran" class="form-control">
                        <option value="DITEMPAT" {{ $items->tipe_pembayaran == 'DITEMPAT' ? 'selected' : ''}} >DITEMPAT</option>
                        <option value="TRANSFER" {{ $items->tipe_pembayaran == 'TRANSFER' ? 'selected' : ''}} >TRANSFER</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan"> Keterangan  </label>
                    <input type="text"  class="form-control" name="keterangan" id="keterangan" value="{{ $items->keterangan}}" placeholder="Masukkan keterangan....">
                </div>                            
                <button type="submit" class="btn btn-primary btn-block"> Update </button>
            </form>
        </div>
    </div>
</div>
@endsection