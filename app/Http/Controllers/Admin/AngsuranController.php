<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AngsuranEditRequest;
use App\Http\Requests\Admin\AngsuranOneRequest;
use App\Http\Requests\Admin\AngsuranThreeRequest;
use App\Http\Requests\Admin\AngsuranTwoRequest;
use App\Http\Requests\Admin\AngsuranTypeLoan;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\TypeInstallment;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AngsuranController extends Controller
{
    //

    public function index(){

        $items = Installment::with(['type_installments','loans','users'])->get() ;
        return view('pages.admin.angsuran.index',[
            'items' => $items
        ]);
    }



    public function createOne(Request $request){
        $createAngsuran = $request->session()->get('createAngsuran');
        $Users = User::orderBy('nama')
         ->where('ROLES', '=', 'USER')
        ->get();

        return view('pages.admin.angsuran.create',[
            'createAngsuran' => $createAngsuran,
            'Users' => $Users,

        ]);
    }

    public function createOnePost(AngsuranOneRequest $request){
        $validateData = $request->all();

        $request->session()->put('createAngsuran',$validateData);

        return redirect()->route('angsuran-create-findLoan');
    }


    public function createTypeLoan(Request $request){
        $createAngsuran = $request->session()->get('createAngsuran');

        $query = DB::table('users')
                ->join('loans','loans.user_id','=','users.id')
                ->where('users.id','=',$createAngsuran['user_id'])
                ->where('loans.status','=', 'MENGANGSUR')
                ->first();
        if ( !$query) {
            return redirect()->route('angsuran-index')->with('createAngsuranError','User tidak mengajukan pinjaman');
        } else {
            $createAngsuran['nominal_pinjaman'] = $query->nominal_pinjaman;
            $createAngsuran['loan_id'] = $query->id;
        }
        
        $request->session()->put('createAngsuran',$createAngsuran);
        
        return view('pages.admin.angsuran.create-find-loan',[
            'createAngsuran' => $createAngsuran,
        ]);
    }

    public function createTypeLoanPost(AngsuranTypeLoan $request){
        $createAngsuran = $request->session()->get('createAngsuran');

        $query = Installment::select('*')
                ->where('loan_id','=',$createAngsuran['loan_id'])
                ->where('user_id','=',$createAngsuran['user_id'])
                ->where('status','=','LUNAS')
                ->orderBy('created_at', 'DESC')
                ->first();

        // TELAH MENGANGSUR

        if ($query) {

            $createAngsuran['type_installment_id'] = $query->type_installment_id;
            $createAngsuran['nominal_hasil'] =$query->nominal_hasil;
            $createAngsuran['angsuran_ke'] = $query->angsuran_ke;

            $request->session()->put('createAngsuran',$createAngsuran); 
            return redirect()->route('angsuran-createTwo');

        } else{

             // BELUM PERNAH MENGANGSUR
            $request->session()->put('createAngsuran',$createAngsuran);         
            return redirect()->route('angsuran-createTwo');
        }
        return redirect()->route('angsuran-index')->with('createAngsuranError','User tidak mengajukan pinjaman');
    }

    public function createTwo(Request $request) {
        $createAngsuran = $request->session()->get('createAngsuran');
        $TypeInstallment = TypeInstallment::all();

        if ( empty($createAngsuran['type_installment_id']) || $createAngsuran['type_installment_id'] == 2 ) {

            $data['type_installment_id'] = $TypeInstallment[0]->id;
            $data['nama_tipe_angsuran'] = $TypeInstallment[0]->nama_tipe_angsuran;
            
        } else {
            $data['type_installment_id'] = $TypeInstallment[1]->id;
            $data['nama_tipe_angsuran'] = $TypeInstallment[1]->nama_tipe_angsuran;
        }   

        return view('pages.admin.angsuran.create-find',[
            'createAngsuran' => $createAngsuran,
            'TypeInstallment' => $data

        ]);

        
    }

    public function createTwoPost(AngsuranTwoRequest $request){
        $validateData = $request->all();

        $createAngsuran = $request->session()->get('createAngsuran');

        $createAngsuran['type_installment_id'] = $validateData['type_installment_id'];

        $request->session()->put('createAngsuran',$createAngsuran);

        return redirect()->route('angsuran-createThree');
    }

    public function createThree(Request $request){
        $createAngsuran = $request->session()->get('createAngsuran');

        if ( empty($createAngsuran['angsuran_ke'])) {
            $createAngsuran['angsuran_ke'] = 1;
        }else{
            $createAngsuran['angsuran_ke'] += 1;
        }

        if ($createAngsuran['type_installment_id'] == 1) {
            $res = $createAngsuran['nominal_pinjaman'] / 12;

            if ( empty($createAngsuran['nominal_hasil']) || $createAngsuran['nominal_hasil'] > $res  ) {
                
                $createAngsuran['nominal_angsuran'] = $res;

            } else if( $createAngsuran['nominal_hasil'] < $res ){

                $createAngsuran['nominal_angsuran'] = $createAngsuran['nominal_hasil'];
            }
        }


        if ($createAngsuran['type_installment_id'] == 2) {
            $res = $createAngsuran['nominal_hasil'] * 0.02;
            $createAngsuran['nominal_angsuran'] = $res;
        } 

        return view('pages.admin.angsuran.create-calculate',[
            'createAngsuran' => $createAngsuran

        ]);
        
    }


    public function createThreePost(AngsuranThreeRequest $request){
        $validateData = $request->all();
        $createAngsuran = $request->session()->get('createAngsuran');
        $result_nominal_hasil = 0;
        if ($validateData['angsuran_ke'] == 1) {
            $result_nominal_hasil = $createAngsuran['nominal_pinjaman'] - $validateData['nominal_angsuran'];

        } elseif ( $createAngsuran['type_installment_id'] == 1 && $validateData['nominal_angsuran'] >= $createAngsuran['nominal_hasil']) {
            $result_nominal_hasil = $createAngsuran['nominal_hasil'] - $validateData['nominal_angsuran']  ;

            if ( 0 >= $result_nominal_hasil) {
                $item = Loan::findOrFail($createAngsuran['loan_id']);
                $item->status = 'LUNAS';
                $item->tanggal_lunas = $validateData['tanggal_pembayaran'];
                $item->save();
                
            }

            
        }
        elseif ( $createAngsuran['type_installment_id'] == 1) {
            $result_nominal_hasil = $createAngsuran['nominal_hasil'] - $validateData['nominal_angsuran'];
        }else {
            $result_nominal_hasil = $createAngsuran['nominal_hasil'];
        }

        Installment::create([
            'user_id' => $createAngsuran['user_id'],
            'loan_id' => $createAngsuran['loan_id'],
            'type_installment_id' => $createAngsuran['type_installment_id'],
            'nominal_angsuran' => $validateData['nominal_angsuran'],
            'angsuran_ke' => $validateData['angsuran_ke'],
            'tanggal_pembayaran' => $validateData['tanggal_pembayaran'],
            'status' => $validateData['status'],
            'tipe_pembayaran' => $validateData['tipe_pembayaran'],
            'nominal_hasil' => $result_nominal_hasil
        ]);
        $request->session()->forget('createAngsuran');
        return redirect()->route('angsuran-index')->with('add-success','Data berhasil ditambah');
    }

    public function edit($id){
        $item =  Installment::with(['type_installments','loans','users'])
            ->find($id);
            
        return view('pages.admin.angsuran.edit',[
            'item' => $item
        ]);
    }

    public function show($id){
        $item = Installment::with(['type_installments','loans','users'])
            ->find($id);

        return view('pages.admin.angsuran.show',[
            'item' => $item
        ]);
    }

    public function update($id,AngsuranEditRequest $request){
        $validateData = $request->all();

        $InstallmentUpdate = Installment::findOrFail($id);

        // $InstallmentUpdate->update(
        //     'tanggal_pembayaran' => $validateData['tanggal_pembayaran'],
        //     'status' => $validateData['status']
        // );

        $InstallmentUpdate->update($validateData);

        return redirect()->route('angsuran-index')->with('update-success','Berhasil Mengubah data');
    }

    public function destroy($id){

        Installment::findOrFail($id)->delete();

        return redirect()->route('angsuran-index')->with('delete-success','Berhasil menghapus data') ;

    }

    public function indexLaporanAngsuran(){
        return view('pages.admin.angsuran.laporan.index');
    }


    public function cetakSemuaLaporanAngsuran(){
        $itemsAll = Installment::with(['users','loans','type_installments'])
            ->where('status','=', 'LUNAS')
            ->get();

        $itemsPokok = Installment::with(['users','loans','type_installments'])
            ->where('type_installment_id','=',1)
            ->where('status','=', 'LUNAS')
            ->get();

        $itemsJasa = Installment::with(['users','loans','type_installments'])
            ->where('type_installment_id','=',2)
            ->where('status','=', 'LUNAS')
            ->get();

        if ($itemsAll->first() == null && $itemsJasa->first() == null && $itemsPokok->first() == null ){
            return redirect()->route('angsuran-laporan-index')->with('dataNull','User Tidak Melakukan Angsuran');
        }

        $pdf = PDF::loadView('pages.admin.angsuran.laporan.laporansemua',[
            'itemsAll' => $itemsAll,
            'itemsPokok' => $itemsPokok,
            'itemsJasa' => $itemsJasa
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan-Semua-Angsuran.PDF');
    }

    public function cetakTotalAngsuranPernama(){
        $itemsAll = DB::query()
        ->select(
            'l.nominal_pinjaman AS nominal_pinjaman',
            'l.user_id as user_id'
        )

        ->selectRaw('SUM(i.nominal_angsuran) AS total_angsuran')
        ->from('installments','i')
        ->join('loans as l','l.id','i.loan_id')
        ->groupBy('l.id')
        ->where('i.status','=','LUNAS')
        ->get();

        $user = User::all();

        $pdf = PDF::loadView('pages.admin.angsuran.laporan.laporan_totalpernama',[
            'itemsAll' => $itemsAll,
            'users' => $user
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan-Semua-Angsuran.PDF');
    }

    public function laporanCariNama(){
        $items = User::orderBy('nama')->get();

        return view('pages.admin.angsuran.laporan.carinama',[
            'items' => $items]);
    }

    public function cetakPernamaLaporanAngsuran(Request $request){
        $id = $request['user_id'];

        $itemAll = Installment::with(['users','loans','type_installments'])
        ->where('user_id','=',$id)
        ->where('status','=', 'LUNAS')
        ->get();

        $itemPokok = Installment::with(['users','loans','type_installments'])
            ->where('user_id','=',$id)
            ->where('type_installment_id','=',1)
            ->where('status','=', 'LUNAS')
            ->get();

        $itemJasa = Installment::with(['users','loans','type_installments'])
            ->where('user_id','=',$id)
            ->where('type_installment_id','=',2)
            ->where('status','=', 'LUNAS')
            ->get();
    
        if ($itemAll->first() == null && $itemJasa->first() == null && $itemPokok->first() == null ){
            return redirect()->route('angsuran-laporan-index')->with('dataNull','User Tidak Melakukan Angsuran');
        }

        if ($itemAll->first() != null) {
            $name =  $itemAll->first()->users->nama;
        }
        else if ($itemPokok->first() != null) {
            $name = $itemPokok->first()->users->nama;
        }else{
            $name = $itemJasa->first()->users->nama;
        }

        $pdf = PDF::loadView('pages.admin.angsuran.laporan.laporanpernama',[
            'itemAll' => $itemAll,
            'itemPokok' => $itemPokok,
            'itemJasa' => $itemJasa,
            'name' => $name
        ])->setPaper('a4', 'landscape');

        return $pdf->stream("Laporan-Angsuran-{$name}.PDF");

    }
}
