@extends('layouts.user')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ganti Password </h1>
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
            <form action="{{ route('ubahdatadiri-user-updatechangepassword')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="{{ Auth::user()->id}}">
                </div>

                <div class="form-group">
                    <label for="oldPassword"> Old Password </label>
                    <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="masukan password lama...">
                </div>
                <div class="form-group">
                    <label for="newPassword"> New Password </label>
                    <input type="password" class="form-control" name="password" id="newPasssword" placeholder="masukan password baru...">
                </div>
                <div class="form-group">
                    <label for="confirmNewPassword"> Confirm New Password </label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirmNewPassword" placeholder=" konfirmasi masukan password baru...">
                </div>
                <button type="submit" class="btn btn-primary btn-block"> Update </button>

            </form>
        </div>
    </div>
</div>
@endsection