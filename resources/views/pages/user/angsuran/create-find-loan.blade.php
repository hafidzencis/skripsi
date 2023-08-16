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
            <form action="{{ route('angsuran-createFindLoanPost-user') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="loan_id"> Nominal Pinjaman </label>
                    <input type="hidden" name="loan_id"  value="{{ $createAngsuranUser['loan_id'] }}">
                    <input type="text" id="loan_id" class="form-control" readonly value="@currency($createAngsuranUser['nominal_pinjaman'])" > 
                </div>

                <button type="submit" class="btn btn-primary btn-block"> Lanjut </button>

            </form>
        </div>
    </div>
</div>
@endsection