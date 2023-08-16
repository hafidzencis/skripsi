<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SimpananOneRequest;
use App\Http\Requests\Admin\SimpananRequest;
use App\Http\Requests\Admin\SimpananTwoRequest;
use App\Models\Deposit;
use App\Models\TypeDeposit;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Midtrans\Config;
use Midtrans\Snap;



class UserSimpananController extends Controller
{
    public function indexSimpananUser()
    {

        $items= Deposit::with(['users','type_deposits'])
        ->where('user_id','=',Auth::user()->id)    
        ->get();

        return view('pages.user.simpanan.index',[
            'result' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSimpananUser(Request $request)
    {
        
        $createSimpananUser = $request->session()->get('createSimpananUser');
        $types_deposit = TypeDeposit::all();

        return view('pages.user.simpanan.create',[
            'types_deposit' => $types_deposit,
            'createSimpananUser' => $createSimpananUser
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSimpananUser(SimpananOneRequest $request)
    {
        $validateData = $request->all();

        $query = DB::table('deposits')
        ->where('user_id','=', $validateData['user_id'])
        ->where('type_deposit_id','=','2')
        ->where('status','=','LUNAS')
        ->first();

        // dd($validateData);
        if ($validateData['type_deposit_id'] == 1) {
            if (!$query) {
                return redirect()->route('simpanan-user')->with('noCreateSimpananWajib','User belum melakukan simpanan wajib');
            }
        }
    
        if ($validateData['type_deposit_id'] == 2) {
            if ($query) {
                return redirect()->route('simpanan-user')->with('existsSimpananWajib','User sudah melakukan simpanan wajib');
            }
            
        }
        
            $request->session()->put('createSimpananUser',$validateData);

            return redirect()->route('simpanan-user-create-type');

    }

    public function createSimpananTypeUser(Request $request){
        $createSimpananUser = $request->session()->get('createSimpananUser');
        $nominal_simpanan = 0;
        if( $createSimpananUser['type_deposit_id'] == 1){
            $nominal_simpanan = 20000;
        } else {
            $nominal_simpanan = 50000;
        }

        return view('pages.user.simpanan.create_type',[
            'createSimpananUser' => $createSimpananUser,
            'nominal_simpanan' => $nominal_simpanan
        ]);
    }

    public function postSimpananTypeUser(SimpananTwoRequest $request){
        $createSimpananUser = $request->session()->get('createSimpananUser');
        $validateData = $request->all();
        
        $createSimpananUser['nominal_simpanan'] = $validateData['nominal_simpanan'];
        $createSimpananUser['status'] = $validateData['status'];
        $createSimpananUser['tipe_pembayaran'] = $validateData['tipe_pembayaran'];
        $createSimpananUser['keterangan'] = $validateData['keterangan'];
        $createSimpananUser['total_transaction'] = $validateData['nominal_simpanan'] + 10000;
        $createSimpananUser['user_id'] = Auth::user()->id;

        $item = Deposit::create($createSimpananUser);

        $request->session()->forget($createSimpananUser);

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
        $uuid = Str::uuid()->toString();

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'SIMPANAN-'. $item->id .'-'. $uuid,
                'gross_amount' => (int) $item->total_transaction
            ],
            'customer_details' => [
                'first_name' => $item->users->nama,
                'email' => $item->users->email
            ],

        ];


        try {
            $snapToken = Snap::getSnapToken($midtrans_params);

            return view('pages.user.simpanan.create_total',[
                'snapToken' => $snapToken,
                'item' => $item
            ]);



        } catch (Exception $error) {
            
            echo $error->getMessage();
        }

        // $request->session()->put('createSimpananUser',$createSimpananUser);
        // return redirect()->route('simpanan-user-create-total');
        
    }

    // public function createTotalSimpanan(Request $request){
    //     $createSimpananUser = $request->session()->get('createSimpananUser');
    //     if ($createSimpananUser['type_deposit_id'] == 1  ) {
    //         $createSimpananUser['nama_tipe_deposit'] = 'Simpanan Pokok';
    //     } else {
    //         $createSimpananUser['nama_tipe_deposit'] = 'Simpanan Wajib';
    //     }

    //     return view('pages.user.simpanan.create_total',[
    //         'createSimpananUser' => $createSimpananUser
    //     ]);
    // }

    public function createTotalSimpananPost(Request $request){


        // $createSimpananUser = $request->session()->get('createSimpananUser');


        // unset($createSimpananUser['nama_tipe_deposit']);

        // // $id = Deposit::create($createSimpananUser)->id;


        // $item= Deposit::with(['users','type_deposits'])
        // ->find($id); 

        


        // try {
        //     $snapToken = Snap::getSnapToken($midtrans_params);

        //     $request->session()->forget('createSimpananUser');
        //     return view('pages.user.payment_gateway',[
        //         'snapToken' => $snapToken
        //     ]);

        //     // return redirect()->route('checkout',$item->transaction_id);
        //     // // Ambil halaman document midtrans
        //     // $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

        //     // // re direct ke halaman midtrans

        //     // // echo("Berhasil");
        //     return ;

        // } catch (Exception $error) {
            
        //     //throw $error;
        //     echo $error->getMessage();
        // }
        // // dd($snapToken);
        

    
    }

    public function detail($id){
        $item= Deposit::with(['users','type_deposits'])
        ->find($id);   
        

        return view('pages.user.simpanan.show',[
            'item' => $item
        ]);

    }

}
