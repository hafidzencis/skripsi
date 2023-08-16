<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PinjamanRequestOne;
use App\Http\Requests\Admin\PinjamanRequestTwo;
use App\Models\Loan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class UserPinjamanController extends Controller
{
    //
    public function indexPinjamanUser(){
        $items = Loan::where('user_id',Auth::user()->id)->get();

        return view('pages.user.pinjaman.index',[
            'items' => $items
        ]);
    }

    public function createOneUser(Request $request){
        $createPinjamanUser = $request->session()->get('createPinjamanUser');
        return view('pages.user.pinjaman.create',[
            'createPinjamanUser' => $createPinjamanUser
            
        ]);
        
    }

    public function createOneUserPost(PinjamanRequestOne $request){

        $validateData = $request->all();

        $querySimpananWajib = DB::table('deposits')
        ->where('user_id','=', $validateData['user_id'])
        ->where('type_deposit_id','=','2')
        ->first();

        if (!$querySimpananWajib) {
            return redirect()->route('pinjaman-user')->with('noCreateSimpananWajib','User harus melakukan simpanan wajib dahulu!');
        } 

        $querySimpananPokok = DB::table('deposits')
        ->where('user_id','=', $validateData['user_id'])
        ->where('type_deposit_id','=','1')
        ->first();

        if (!$querySimpananPokok) {
            return redirect()->route('pinjaman-user')->with('noCreateSimpananPokok','User harus melakukan simpanan pokok dahulu!');
        }
        
        $query = DB::table('loans')
                ->join('users','users.id','=','loans.user_id')
                ->where('users.id','=',$validateData['user_id'])
                ->where('status','=','MENGANGSUR')
                ->exists();

        if ( $query ) {
            $request->session()->forget('createPinjaman');

            return redirect()->route('pinjaman-user')->with('user_exists','User ini sedang melakukan pinjaman');
        }
        $request->session()->put('createPinjamanUser',$validateData);

        return redirect()->route('pinjaman-createTwo-user');
    }

    public function createTwoUser(Request $request){
        $createPinjamanUser = $request->session()->get('createPinjamanUser');
        return view('pages.user.pinjaman.create-calculate',['createPinjamanUser' => $createPinjamanUser
    
        ]);
    }

    public function createTwoUserPost(PinjamanRequestTwo $request){
        $createPinjamanUser = $request->session()->get('createPinjamanUser');
        $validateData = $request->all();

        $createPinjamanUser['administrasi'] = $validateData['administrasi'];
        $createPinjamanUser['status'] = $validateData['status'];
        $createPinjamanUser['tipe_pembayaran'] = $validateData['tipe_pembayaran'];
        $createPinjamanUser['keterangan'] = $validateData['keterangan'];
        $createPinjamanUser['total_transaction'] = $validateData['administrasi'] + 10000;

        $item =  Loan::create($createPinjamanUser);
        
        $request->session()->forget('createPinjaman');


        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
        $uuid = Str::uuid()->toString();

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'PINJAMAN-'. $item->id .'-'. $uuid,
                'gross_amount' => (int) $item->total_transaction
            ],
            'customer_details' => [
                'first_name' => $item->users->nama,
                'email' => $item->users->email
            ],

        ];

        try {
            $snapToken = Snap::getSnapToken($midtrans_params);

            return view('pages.user.pinjaman.create_total',[
                'snapToken' => $snapToken,
                'item' => $item
            ]);


        } catch (Exception $error) {
            
            echo $error->getMessage();
        }

    }
    

    // public function createTotalUser(Request $request){
    //     $createPinjamanUser = $request->session()->get('createPinjamanUser');

    //     return view('pages.user.pinjaman.create_total',[
    //         'createPinjamanUser' => $createPinjamanUser
    //     ]);
    // }

    // public function createTotalUserPost(Request $request){

    //     $createPinjamanUser = $request->session()->get('createPinjamanUser');
        
    //     Loan::create($createPinjamanUser);
    //     $request->session()->forget('createPinjaman');

    //     return redirect()->route('pinjaman-user');
    // }

    public function detailUser($id){
        $items = Loan::findOrFail($id);
        return view('pages.user.pinjaman.show',[
            'items'=>$items
        ]);

    }
}
