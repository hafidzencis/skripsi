<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PinjamanRequestOne;
use App\Http\Requests\Admin\PinjamanRequestTwo;
use App\Http\Requests\Admin\PinjamanUpdateRequest;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

use function Ramsey\Uuid\v1;

class PinjamanController extends Controller
{

    public function index(){
        $items = Loan::all();
        return view('pages.admin.pinjaman.index',[
            'items' => $items
        ]);
    }

    public function createOne(Request $request){
        $Users = User::orderBy('nama')
        ->where('ROLES', '=', 'USER')
        ->get();
        $createPinjaman = $request->session()->get('createPinjaman');
        return view('pages.admin.pinjaman.create',[
            'createPinjaman' => $createPinjaman,
            'Users' => $Users
            ]);
        
    }

    public function createOnePost(PinjamanRequestOne $request){

        $validateData = $request->all();

        $querySimpananWajib = DB::table('deposits')
        ->where('user_id','=', $validateData['user_id'])
        ->where('type_deposit_id','=','2')
        ->first();

        if (!$querySimpananWajib) {
            return redirect()->route('pinjaman-index')->with('noCreateSimpananWajib','User harus melakukan simpanan wajib dahulu!');
        } 

        $querySimpananPokok = DB::table('deposits')
        ->where('user_id','=', $validateData['user_id'])
        ->where('type_deposit_id','=','1')
        ->first();

        if (!$querySimpananPokok) {
            return redirect()->route('pinjaman-index')->with('noCreateSimpananPokok','User harus melakukan simpanan pokok dahulu!');
        }
        
        $query = DB::table('loans')
                ->join('users','users.id','=','loans.user_id')
                ->where('users.id','=',$validateData['user_id'])
                ->where('status','=','MENGANGSUR')
                ->exists();

        if ( $query ) {
            $request->session()->forget('createPinjaman');
            return redirect()->route('pinjaman-index')->with('user_exists','User ini sedang melakukan pinjaman');
        }

        if ( empty($request->session()->get('createPinjaman') )) {
            $createPinjaman = new Loan();
            $createPinjaman->fill($validateData);
            $request->session()->put('createPinjaman',$createPinjaman);
        } else {
            $createPinjaman = $request->session()->get('createPinjaman');
            $createPinjaman->fill($validateData);
            $request->session()->put('createPinjaman',$createPinjaman);
        } 

        return redirect()->route('pinjaman-createTwo');
    }

    public function createTwo(Request $request){
        $createPinjaman = $request->session()->get('createPinjaman');
        return view('pages.admin.pinjaman.create-calculate',compact('createPinjaman',$createPinjaman));
    }

    public function createTwoPost(PinjamanRequestTwo $request){
        $validateData = $request->all();

        $createPinjaman = $request->session()->get('createPinjaman');
        $createPinjaman->fill($validateData);

        $createPinjaman->save();

        $request->session()->forget('createPinjaman');
        return redirect()->route('pinjaman-index')->with('add-success','Data berhasil ditambah');
    }

    public function detail($id){
        $items = Loan::findOrFail($id);
        $name = $items->users->nama;
        return view('pages.admin.pinjaman.show',[
            'items'=>$items,
            'name' => $name
        ]);

    }

    public function edit($id){
        $items = Loan::with(['users'])->find($id);
        $all_user = User::all();
        $user = $items->users;
        return view('pages.admin.pinjaman.edit',[
            'items'=>$items,
            'all_user' => $all_user,
            'user' => $user
        ]);
    }

    public function update(PinjamanUpdateRequest $request, $id){
        $validateData = $request->all();

        $items = Loan::findOrFail($id);

        $items->update($validateData);

        return redirect()->route('pinjaman-index')->with('update-success','Berhasil Mengubah data');
    }

    public function destroy($id){

        Loan::findOrFail($id)->delete();

        return redirect()->route('pinjaman-index')->with('delete-success','Berhasil menghapus data') ;

    }


    public function indexLaporanPinjaman(){
        return view('pages.admin.pinjaman.laporan.index');
    }

    public function laporanCariNama(){
        $Users = User::orderBy('nama')->get();

        return view('pages.admin.pinjaman.laporan.carinama',[
            'Users' => $Users
        ]);
    }

    public function cetakSemuaLaporan(){
        $item_lunas = Loan::with(['users'])
        ->where('status','=','LUNAS')
        ->get();

        $item_ngangsur = Loan::with(['users'])
        ->where('status','=','MENGANGSUR')
        ->get();

        $pdf = PDF::loadView('pages.admin.pinjaman.laporan.laporan_semua',[
            'item_lunas' => $item_lunas,
            'item_ngangsur' => $item_ngangsur,
        ])->setPaper('a4', 'landscape');

        return $pdf->stream("Semua-Laporan-Pinjaman.PDF");
    }

    public function cetakTotalPinjamanPernama(){
        $item_lunas = DB::query()
        ->select(
            'u.nama AS nama'
        )

        ->selectRaw('SUM(l.nominal_pinjaman) AS total_pinjaman')

        ->from('loans','l')
        ->join('users as u','l.user_id','u.id')
        ->groupBy('l.user_id')
        ->where('l.status','=','LUNAS')
        ->get();


        $pdf = PDF::loadView('pages.admin.pinjaman.laporan.laporan_totalpernama',[
            'item_lunas' => $item_lunas

        ])->setPaper('a4', 'landscape');

        return $pdf->stream("Semua-Laporan-Pinjaman.PDF");
    }

    public function cetakLaporanPerNama(Request $request){
        
        $validateData = $request->all();
        $name = null;
        $item_lunas = Loan::with(['users'])
                ->where('user_id','=',$validateData['user_id'],'and')
                ->where('status','=','LUNAS')
                ->get();

                $item_ngangsur = Loan::with(['users'])
                ->where('user_id','=',$validateData['user_id'],'and')
                ->where('status','=','MENGANGSUR')
                ->get();

        if ($item_lunas->first() == null && $item_ngangsur->first() == null) {
            return redirect()->route('pinjaman-laporan-index')->with('dataNull','User Tidak Mengajukan Pinjaman');
        }
        
        if ($item_lunas->first() != null) {
            $name =  $item_lunas->first()->users->nama;
        }
        else if ($item_ngangsur->first() != null) {
            $name = $item_ngangsur->first()->users->nama;
        }

        $pdf = PDF::loadView('pages.admin.pinjaman.laporan.laporan_pernama',[
            'item_lunas' => $item_lunas,
            'item_ngangsur' => $item_ngangsur,
            'name' => $name
        ])->setPaper('a4', 'landscape');

        return $pdf->stream("Laporan-Pinjaman-{$name}.PDF");

    }

}
