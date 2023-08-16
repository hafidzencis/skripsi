@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah data diri </h1>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('ubahdatadiri-update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input type="hidden"  class="form-control" name="id" id="id" value="{{ $item->id }}">
                </div>

                <div class="form-group">
                    <label for="nama"> Nama </label>
                    <input type="text"  class="form-control" name="nama" id="nama" value="{{ $item->nama }}" placeholder="Masukkan nama...">
                </div>
                <div class="form-group">
                    <label for="nik"> NIK  </label>
                    <input type="text"  class="form-control" name="nik" id="nik" value="{{ $item->nik }}" placeholder="Masukkan titke...">
                </div>
                <div class="form-group">
                    <label for="no_htp"> No HP </label>
                    <input type="text"  class="form-control" name="no_hp" id="no_hp" value="{{ $item->no_hp }}" placeholder="Masukkan no hp...">
                </div>
                <div class="form-group">
                    <label for="tempat_lahir"> Tempat Lahir </label>
                    <input type="text"  class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ $item->tempat_lahir }}" placeholder="Masukkan tempat lahir...">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir"> Tanggal Lahir </label>
                    <input type="date"  class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $item->tanggal_lahir }}" placeholder="Masukkan tanggal lahir...">
                </div>
                <div class="form-group">
                    <label for="alamat"> Alamat </label>
                    <input type="text"  class="form-control" name="alamat" id="alamat" value="{{ $item->alamat }}" placeholder="Masukkan alamat...">
                </div>
                <div class="form-group">
                    <label for="bank"> Bank</label>
                    <input type="text"  class="form-control" name="bank" id="bank" value="{{ $item->bank }}" placeholder="Masukkan bank...">
                </div>
                <div class="form-group">
                    <label for="image_3x4"> Foto 3x4 </label>
                    <input type="file"  class="form-control" name="image_3x4" id="image_3x4" value="{{ $item->image_3x4 }}" placeholder="Masukkan image 3x4...">
                </div>
                <div class="form-group">
                    <label for="image_ktp"> Foto KTP </label>
                    <input type="file"  class="form-control" name="image_ktp" id="image_ktp" value="{{ $item->image_ktp }}" placeholder="Masukkan image ktp...">
                </div>
            
                <button type="submit" class="btn btn-primary btn-block"> Ubah </button>

            </form>
        </div>
    </div>

<!-- End of Main Content -->



</div>
@endsection