@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reset Password {{$user->nama}} </h1>
    </div>

    @if(session()->has('userDiffPassword'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('userDiffPassword')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('usermanages.update',$user->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="{{ Auth::user()->id}}">
                </div>

                <div class="form-group">
                    <label for="newPassword"> New Password </label>
                    <input type="password" class="form-control" name="password" id="newPasssword" placeholder="masukan password baru...">
                </div>
                <div class="form-group">
                    <label for="confirmNewPassword"> Confirm New Password </label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirmNewPassword" placeholder=" konfirmasi masukan password baru...">
                </div>
                <button type="submit" class="btn btn-primary btn-block"> Cetak </button>

            </form>
        </div>
    </div>
</div>
@endsection