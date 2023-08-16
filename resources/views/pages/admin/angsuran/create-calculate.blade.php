@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Angsuran </h1>
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
            <form action=" {{ route('angsuran-createThreePost')}} " method="post">
                @csrf
                <div class="form-group">
                    <label for="nominal_pinjaman"> Nominal Pinjaman </label>
                    <input type="text"  class="form-control" name="nominal_pinjaman" id="nominal_pinjaman" value="{{$createAngsuran['nominal_pinjaman']}}" disabled>
                </div>

                <div class="form-group">
                    <label for="nominal_angsuran"> Nominal Angsuran </label>
                    @if ($createAngsuran['type_installment_id'] == 1)
                        <p style="font-size:15px;color:blue">* Minimal Pembayaran sejumlaha @currency(round($createAngsuran['nominal_angsuran']) )</p>
                        <input type="text"  class="form-control" name="nominal_angsuran" id="nominal_angsuran" value="{{ round($createAngsuran['nominal_angsuran'])   }}" >
                    @else
                    <input type="text" readonly  class="form-control" name="nominal_angsuran" id="nominal_angsuran" value="{{ round($createAngsuran['nominal_angsuran'])   }}" >
                    @endif
                </div>

                <div class="form-group">
                    <label for="angsuran_ke"> Angsuran Ke  </label>
                    <input type="text" readonly class="form-control" name="angsuran_ke" id="angsuran_ke" value="{{ $createAngsuran['angsuran_ke']}}" >
                </div>

                <div class="form-group">
                    <label for="tanggal_pembayaran"> Tanggal Pembayaran </label>
                    <input type="date"  class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" value="" >
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
                    <label for="tipe_pembayaran">Tipe Pembayaran</label>
                    <select name="tipe_pembayaran" id="tipe_pembayaran" name="tipe_pembayaran" class="form-control">
                        <option value=""> ===DIISI===</option>
                        <option value="DITEMPAT">DITEMPAT</option>
                        <option value="TRANSFER">TRANSFER</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="keterangan"> Keterangan (Boleh Diisi Atau Tidak) </label>
                    <input type="text"  class="form-control" name="keterangan" id="keterangan" value="" placeholder="Masukkan keterangan..." >
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Tambah </button>

            </form>
        </div>
    </div>
</div>
    
@endsection