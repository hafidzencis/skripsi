@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pinjaman </h1>
        </a>
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
            <form action="{{ route('pinjaman-createTwoPost')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="administrasi"> Administrasi </label>
                    <p style="font-size:15px;color:blue">* Biaya adminitrasi 0,5 % X Nominal Pinjaman</p>
                    <input type="text"  class="form-control" name="administrasi" id="administrasi" value="{{ 0.005 * $createPinjaman->nominal_pinjaman}}" placeholder="title">
                </div>                          
                <div class="form-group">
                    <label for="setuju"> Disetujui </label>
                    <select name="setuju" id="setuju" class="form-control">
                        <option value="">===DI ISI===</option>
                        <option value="0">Tidak Setuju</option>
                        <option value="1"> Setuju</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_acc_pinjaman"> Tanggal Acc Pinjaman </label>
                    <input type="date"  class="form-control" name="tanggal_acc_pinjaman" id="tanggal_acc_pinjaman" value="" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="tanggal_pembayaran_administrasi"> Tanggal Pembayaran Administrasi </label>
                    <input type="date"  class="form-control" name="tanggal_pembayaran_administrasi" id="tanggal_pembayaran_administrasi"  placeholder="Masukan tanggal ajuan pinjaman.....">
                </div>
                <div class="form-group">
                    <label for="tanggal_lunas"> Tanggal Lunas  </label>
                    <input type="date"  class="form-control" name="tanggal_lunas" id="tanggal_lunas" value="" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="status"> Status  </label>
                    <select name="status" id="status" class="form-control">
                        <option value=""> ===DIISI===</option>
                        <option value="PENDING">PENDING</option>
                        <option value="GAGAL">GAGAL</option>
                        <option value="MENGANGSUR">MENGANGSUR</option>
                        <option value="LUNAS">LUNAS</option>
                    </select>
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
                    <label for="keterangan"> Keterangan (BOLEH TIDAK DIISI) </label>
                    <input type="text"  class="form-control" name="keterangan" id="keterangan" value="" placeholder="Masukkan keterangan...">
                </div>                            
                <button type="submit" class="btn btn-primary btn-block"> Tambah </button>

            </form>
        </div>
    </div>
</div>
@endsection