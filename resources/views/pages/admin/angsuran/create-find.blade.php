@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Angsuran </h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('angsuran-createTwoPost') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="type_installment_id"> Tipe Angsuran </label>
                    <select name="type_installment_id" id="type_installment_id" class="form-control">
                        <option value="{{ $TypeInstallment['type_installment_id'] }}">  {{$TypeInstallment['nama_tipe_angsuran'] }}   </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Lanjut </button>

            </form>
        </div>
    </div>
</div>
@endsection