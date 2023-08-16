@extends('layouts.user')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"> Angsuran </h1>
    <a href="{{ route('angsuran-createOne-user')}}" class="btn btn-sm btn-primary shadow-sm mb-4"><i
        class="fas fa-download fa-sm text-white-50"></i> Mengajukan Angsuran
    </a>

    @if(session()->has('createAngsuranError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('createAngsuranError')}}
        <button type="button" data-dismiss="alert" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Nominal Pinjaman</th>
                            <th>Tipe Angsuran</th>
                            <th>Nominal Angsuran</th>
                            <th>Angsuran ke</th>
                            <th>Tenor</th>
                            <th>Nominal Kurangnya</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->users->nama}}</td>
                            <td> @currency($item->loans->nominal_pinjaman)</td>
                            <td>{{ $item->type_installments->nama_tipe_angsuran}}</td>
                            <td>@currency($item->nominal_angsuran)</td>
                            <td>{{ $item->angsuran_ke}}</td>
                            <td>{{ $item->loans->tenor / 12}} Tahun</td>
                            <td>
                                @if ($item->type_installments->nama_tipe_angsuran == 'Angsuran Pokok')
                                    @currency($item->nominal_hasil)
                                @endif

                                @if ($item->type_installments->nama_tipe_angsuran == 'Angsuran Jasa' || $item->type_installments->nama_tipe_angsuran == null)
                                    ---
                                @endif
                                
                               
                            </td>
                            <td>{{ $item->status}}</td>
                            <td class="d-inline-flex py-">
                                <a href="{{ route('angsuran-user-detail',$item->id )}}" class="btn btn-primary mr-2">
                                    <i class="fa fa-eye"></i>
                                    Detail
                                </a>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                Data Kosong
                            </td>
                        </tr> 
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

