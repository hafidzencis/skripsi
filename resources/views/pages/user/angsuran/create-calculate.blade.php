@extends('layouts.user')

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

    <div class="card shadow">
        <div class="card-body">
            <form action=" {{ route('angsuran-createThreePost-user')}} " method="post">
                @csrf
                <div class="form-group">
                    <label for="nominal_pinjaman"> Nominal Pinjaman </label>
                    <input type="text"  class="form-control" name="nominal_pinjaman" id="nominal_pinjaman" value="{{$createAngsuranUser['nominal_pinjaman']}}" disabled>
                </div>

                <div class="form-group">
                    <label for="nominal_angsuran"> Nominal Angsuran </label>
                    @if ($createAngsuranUser['type_installment_id'] == 1)
                    <p style="font-size:15px;color:blue">* Minimal Pembayaran sejumlaha @currency(round($createAngsuranUser['nominal_angsuran']) )</p>
                    <input type="text"  class="form-control" name="nominal_angsuran" id="nominal_angsuran" value="{{ round($createAngsuranUser['nominal_angsuran'])   }}" >
                    @else
                    <input type="text" readonly  class="form-control" name="nominal_angsuran" id="nominal_angsuran" value="{{ round($createAngsuranUser['nominal_angsuran'])   }}" >
                    @endif  
                </div>

                <div class="form-group">
                    <label for="angsuran_ke"> Angsuran Ke  </label>
                    <input type="text" readonly class="form-control" name="angsuran_ke" id="angsuran_ke" value="{{$createAngsuranUser['angsuran_ke']}}" >
                </div>
                
                <div class="form-group">
                    <input type="hidden" name="status" id="status" value="PENDING" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tipe_pembayaran">Tipe Pembayaran</label>
                    <input type="text" readonly name="tipe_pembayaran" id="tipe_pembayaran" class="form-control" value="TRANSFER">
                </div>

                <div class="form-group">
                    <label for="keterangan"> Keterangan (BOLEH DIISI ATAU TIDAK) </label>
                    <input type="text"  class="form-control" name="keterangan" id="keterangan" value="" placeholder="Masukkan keterangan..." >
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Lanjut  </button>

            </form>
        </div>
    </div>
</div>
    
@endsection