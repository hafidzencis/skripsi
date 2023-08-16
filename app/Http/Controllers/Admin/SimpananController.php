<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SimpananOneRequest;
use App\Http\Requests\Admin\SimpananRequest;
use App\Http\Requests\Admin\SimpananTwoRequest;
use App\Models\Deposit;
use App\Models\TypeDeposit;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class SimpananController extends Controller
{
    public function index_simpanan(){
        
        $items= Deposit::with(['users','type_deposits'])->get();

        // dd($items);
        return view('pages.admin.simpanan.index',[
            'result' => $items
        ]);
    }

    
    public function createFind(Request $request){
        $types_deposit = TypeDeposit::all();
        $createSimpanan = $request->session()->get('createSimpanan');
        $users = User::orderBy('nama')
        ->where('ROLES', '=', 'USER')
        ->get();
        return view('pages.admin.simpanan.create_find',[
            'users' => $users,
            'types_deposit' => $types_deposit,
            'createSimpanan' => $createSimpanan
        ]);
    }

    public function createFindPost(SimpananOneRequest $request){

        $validateData = $request->all();

        $query = DB::table('deposits')
        ->where('user_id','=', $validateData['user_id'],'and')
        ->where('type_deposit_id','=','2')
        ->first();

        if ($validateData['type_deposit_id'] == 1) {
            if (!$query) {
                return redirect()->route('simpanan-index')->with('noCreateSimpananWajib','User belum melakukan simpanan wajib');
            } 
            // else {
            //     return redirect()->route('simpanan-index')->with('existsSimpananWajib','User sudah melakukan simpanan wajib');
            // }
        }

        elseif ($query) {
            return redirect()->route('simpanan-index')->with('existsSimpananWajib','User sudah melakukan simpanan wajib');
        }

        $request->session()->put('createSimpanan',$validateData);

        return redirect()->route('simpanan-create-type');

    }

    public function createType(Request $request){
        $createSimpanan = $request->session()->get('createSimpanan');
        $nominal_simpanan = 0;
        if( $createSimpanan['type_deposit_id'] == 1){
            $nominal_simpanan = 20000;
        } else {
            $nominal_simpanan = 50000;
        }

        return view('pages.admin.simpanan.create_type',[
            'createSimpanan' => $createSimpanan,
            'nominal_simpanan' => $nominal_simpanan
        ]);
    }

    public function createTypePost(SimpananTwoRequest $request){
        $createSimpanan = $request->session()->get('createSimpanan');

        $validateData = $request->all();

        $validateData['user_id'] = $createSimpanan['user_id'];
        $validateData['type_deposit_id'] = $createSimpanan['type_deposit_id'];
        Deposit::create($validateData);

        $request->session()->forget($createSimpanan);
        return redirect()->route('simpanan-index')->with('add-success','Data berhasil ditambah');

    }


    
    public function show($id)
    {

        $item = Deposit::with(['users','type_deposits'])->find($id);

        return view('pages.admin.simpanan.show',[
            'item'=>$item
        ]);
    }

    public function edit($id)
    {
        $items = Deposit::with(['users','type_deposits'])->find($id);
        $user =  $items->users;
        $type_depo = $items->type_deposits;
        $all_user = User::all();
        $all_type_deposit = TypeDeposit::all();
        return view('pages.admin.simpanan.edit',[
            'items' => $items,
            'user' => $user,
            'type_depo' => $type_depo,
            'all_user' => $all_user,
            'all_type_deposit' => $all_type_deposit
        ]);
    }

    public function update(SimpananRequest $request, $id)
    {
        $validateData = $request->all();

        $items = Deposit::findOrFail($id);

        $items->update($validateData);

        return redirect()->route('simpanan-index')->with('update-success','Berhasil Mengubah data');
    }

    public function destroy($id)
    {
        Deposit::findOrFail($id)->delete();

        return redirect()->route('simpanan-index')->with('delete-success','Berhasil menghapus data');

    }


    public function indexLaporanSimpanan(){

        return view('pages.admin.simpanan.laporan.index');
    }

    public function cetakSemuaLaporan(){
        $itemsSimpanan = Deposit::with(['users','type_deposits'])
                        ->where('status','=','LUNAS')->get();

        $itemsSimpananWajib = Deposit::with(['users','type_deposits'])
                        ->where('type_deposit_id','=','2','and')
                        ->where('status','=','LUNAS')->get();
                        
        $itemsSimpananPokok = Deposit::with(['users','type_deposits'])
                        ->where('type_deposit_id','=','1','and')
                        ->where('status','=','LUNAS')->get();
                        
        $pdf = PDF::loadView('pages.admin.simpanan.laporan.laporan_semua',[
            'itemsSimpanan' => $itemsSimpanan,
            'itemsSimpananWajib' => $itemsSimpananWajib,
            'itemsSimpananPokok' => $itemsSimpananPokok

        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan-Simpanan.PDF');
        
    }

    
    public function cetakTotalSimpananPernama(){
        $itemsSimpanan = 
        DB::query()
        ->select(
            'u.nama AS nama'
        )
        ->selectRaw('SUM(d.nominal_simpanan) AS total_simpanan')
        ->from('deposits','d')
        ->join('users as u','d.user_id','u.id')
        ->groupBy('d.user_id')
        ->where('d.status','=','LUNAS')
        ->get();

                        
        $pdf = PDF::loadView('pages.admin.simpanan.laporan.laporan_totalpernama',[
            'itemsSimpanan' => $itemsSimpanan,

        ])->setPaper('a4', 'landscape');

        return $pdf->stream('Laporan-Simpanan.PDF');
        
    }



    public function cariNamaLaporan(){
        $Users = User::orderBy('nama')->get();

        return view('pages.admin.simpanan.laporan.carinama',[
            'Users' => $Users
        ]);
    }

    public function cetakLaporanPernama(Request $request){
        $itemsSimpanan = Deposit::with(['users','type_deposits'])
                        ->where('user_id','=',$request['user_id'],'and')
                        ->where('status','=','LUNAS')->get();

        $itemsSimpananWajib = Deposit::with(['users','type_deposits'])
                        ->where('user_id','=',$request['user_id'],'and')
                        ->where('type_deposit_id','=','2','and')
                        ->where('status','=','LUNAS')->get();
                        
        $itemsSimpananPokok = Deposit::with(['users','type_deposits'])
                        ->where('user_id','=',$request['user_id'],'and')
                        ->where('type_deposit_id','=','1','and')
                        ->where('status','=','LUNAS')->get();
        $name = null;

        if ($itemsSimpanan->first() == null && $itemsSimpananWajib->first() == null && $itemsSimpananPokok == null) {
            return redirect()->route('index-laporan-pinjaman')->with('dataNull','User Tidak melakukan Simpanan');
        }
        
        if ($itemsSimpanan->first() != null) {
            $name =  $itemsSimpanan->first()->users->nama;
        }
        else if ($itemsSimpananPokok->first() != null) {
            $name = $itemsSimpananPokok->first()->users->nama;
        }else{
            $name = $itemsSimpananWajib->first()->users->nama;
        }
                        
        $pdf = PDF::loadView('pages.admin.simpanan.laporan.laporan_pernama',[
            'itemsSimpanan' => $itemsSimpanan,
            'itemsSimpananWajib' => $itemsSimpananWajib,
            'itemsSimpananPokok' => $itemsSimpananPokok,
            'name' => $name

        ])->setPaper('a4', 'landscape');

        return $pdf->stream("Laporan-Simpanan-{$name}.PDF");
        
    }

}
