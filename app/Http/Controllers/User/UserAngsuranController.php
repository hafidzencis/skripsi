<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AngsuranOneRequest;
use App\Http\Requests\Admin\AngsuranThreeRequest;
use App\Http\Requests\Admin\AngsuranTwoRequest;
use App\Http\Requests\Admin\AngsuranTypeLoan;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\TypeInstallment;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class UserAngsuranController extends Controller
{
    public function index(){

        $items = Installment::with(['type_installments','loans','users'])        
        ->where('user_id','=',Auth::user()->id) ->get() ;
        return view('pages.user.angsuran.index',[
            'items' => $items
        ]);
    }



    public function createOne(Request $request){
        $createAngsuranUser = $request->session()->get('createAngsuranUser');

        return view('pages.user.angsuran.create',[
            'createAngsuranUser' => $createAngsuranUser
        ]);
    }

    public function createOnePost(AngsuranOneRequest $request){
        $validateData = $request->all();

        $request->session()->put('createAngsuranUser',$validateData);

        return redirect()->route('angsuran-createFindLoan-user');
    }

    public function createFindLoan(Request $request){
        $createAngsuranUser = $request->session()->get('createAngsuranUser');

        $query = DB::table('users')
                ->join('loans','loans.user_id','=','users.id')
                ->where('users.id','=',$createAngsuranUser['user_id'])
                ->where('loans.status','=', 'MENGANGSUR')
                ->first();

        if ( !$query) {
            return redirect()->route('angsuran-user')->with('createAngsuranError','User tidak mengajukan pinjaman');
        } else {
            $createAngsuranUser['nominal_pinjaman'] = $query->nominal_pinjaman;
            $createAngsuranUser['loan_id'] = $query->id;
        }
        
        $request->session()->put('createAngsuranUser',$createAngsuranUser);
        return view('pages.user.angsuran.create-find-loan',[
            'createAngsuranUser' => $createAngsuranUser,
        ]);

    }

    public function createFindLoanPost(AngsuranTypeLoan $request){
        $createAngsuranUser = $request->session()->get('createAngsuranUser');

        $query = Installment::select('*')
                ->where('loan_id','=',$createAngsuranUser['loan_id'])
                ->where('user_id','=',$createAngsuranUser['user_id'])
                ->where('status','=','LUNAS')
                ->orderBy('created_at', 'DESC')
                ->first();

        // TELAH MENGANGSUR

        if ($query) {

            $createAngsuranUser['type_installment_id'] = $query->type_installment_id;
            $createAngsuranUser['nominal_hasil'] =$query->nominal_hasil;
            $createAngsuranUser['angsuran_ke'] = $query->angsuran_ke;

            $request->session()->put('createAngsuranUser',$createAngsuranUser); 

            return redirect()->route('angsuran-createTwo-user');

        } else{

             // BELUM PERNAH MENGANGSUR
            $request->session()->put('createAngsuranUser',$createAngsuranUser);         
            return redirect()->route('angsuran-createTwo-user');
        }
        return redirect()->route('angsuran-user')->with('createAngsuranError','User tidak mengajukan pinjaman');
    }

    public function createTwo(Request $request){ 
        $createAngsuranUser = $request->session()->get('createAngsuranUser');
        $TypeInstallment = TypeInstallment::all();

        if ( empty($createAngsuranUser['type_installment_id']) || $createAngsuranUser['type_installment_id'] == 2 ) {

            $data['type_installment_id'] = $TypeInstallment[0]->id;
            $data['nama_tipe_angsuran'] = $TypeInstallment[0]->nama_tipe_angsuran;
            
        } else {
            $data['type_installment_id'] = $TypeInstallment[1]->id;
            $data['nama_tipe_angsuran'] = $TypeInstallment[1]->nama_tipe_angsuran;
        }   

        return view('pages.user.angsuran.create-find',[
            'createAngsuranUser' => $createAngsuranUser,
            'TypeInstallment' => $data

        ]);   


        
    }

    public function createTwoPost(AngsuranTwoRequest $request){
        $validateData = $request->all();

        $createAngsuranUser = $request->session()->get('createAngsuranUser');
        $createAngsuranUser['type_installment_id'] = $validateData['type_installment_id'];

        $request->session()->put('createAngsuranUser',$createAngsuranUser);

        return redirect()->route('angsuran-createThree-user');
    }

    public function createThree(Request $request){
        $createAngsuranUser = $request->session()->get('createAngsuranUser');

        if ( empty(  $createAngsuranUser['angsuran_ke'])) {
            $createAngsuranUser['angsuran_ke'] = 1;
        }else{
            $createAngsuranUser['angsuran_ke'] += 1;
        }


        if ($createAngsuranUser['type_installment_id'] == 1) {
            $res = $createAngsuranUser['nominal_pinjaman'] / 12;

            if ( empty($createAngsuranUser['nominal_hasil']) || $createAngsuranUser['nominal_hasil'] > $res  ) {
                
                $createAngsuranUser['nominal_angsuran'] = $res;

            } else if( $createAngsuranUser['nominal_hasil'] < $res ){

                $createAngsuranUser['nominal_angsuran'] = $createAngsuranUser['nominal_hasil'];
            }
        }


        if ($createAngsuranUser['type_installment_id'] == 2) {
            $res = $createAngsuranUser['nominal_hasil'] * 0.02;
            $createAngsuranUser['nominal_angsuran'] = $res;
        } 
        return view('pages.user.angsuran.create-calculate',[
            'createAngsuranUser' =>  $createAngsuranUser

        ]);
        
    }


    public function createThreePost(AngsuranThreeRequest $request){
        $validateData = $request->all();

        $createAngsuranUser = $request->session()->get('createAngsuranUser');

        $result_nominal_hasil = 0;

        if ($validateData['angsuran_ke'] == 1) {

            $result_nominal_hasil = $createAngsuranUser['nominal_pinjaman'] - $validateData['nominal_angsuran'];

        } elseif ( $createAngsuranUser['type_installment_id'] == 1 && $validateData['nominal_angsuran'] > $createAngsuranUser['nominal_hasil']) {

            $result_nominal_hasil = $createAngsuranUser['nominal_hasil'] - $validateData['nominal_angsuran']  ;

            if (0 >= $result_nominal_hasil) {

                $result_nominal_hasil = 0;

            }

        }

        elseif ( $createAngsuranUser['type_installment_id'] == 1) {

            $result_nominal_hasil = $createAngsuranUser['nominal_hasil'] - $validateData['nominal_angsuran'];
        }
        else {
            $result_nominal_hasil = $createAngsuranUser['nominal_hasil'];
        }

        $createAngsuranUser['nominal_angsuran'] = $validateData['nominal_angsuran'];
        $createAngsuranUser['angsuran_ke'] = $validateData['angsuran_ke'];
        $createAngsuranUser['status'] = $validateData['status'];
        $createAngsuranUser['tipe_pembayaran'] = $validateData['tipe_pembayaran'];
        $createAngsuranUser['keterangan'] = $validateData['keterangan'];
        $createAngsuranUser['nominal_hasil'] = $result_nominal_hasil;
        $createAngsuranUser['total_transaction'] = $validateData['nominal_angsuran'] + 10000;

        $nominal_pinjaman = $createAngsuranUser['nominal_pinjaman'];
        unset($createAngsuranUser['nominal_pinjaman']);

        $item =  Installment::create($createAngsuranUser);

        $request->session()->forget($createAngsuranUser);

        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
        $uuid = Str::uuid()->toString();

        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'ANGSURAN-'. $item->id .'-'. $uuid,
                'gross_amount' => (int) $item->total_transaction
            ],
            'customer_details' => [
                'first_name' => $item->users->nama,
                'email' => $item->users->email
            ],

        ];


        try {
            $snapToken = Snap::getSnapToken($midtrans_params);

            return view('pages.user.angsuran.create_total',[
                'snapToken' => $snapToken,
                'item' => $item,
                'nominal_pinjaman' =>  $nominal_pinjaman
            ]);

        } catch (Exception $error) {
            
            echo $error->getMessage();
        }
        
    }


    public function createTotal(Request $request){
        $createAngsuranUser = $request->session()->get('createAngsuranUser');
        return view('pages.user.angsuran.create_total',[
            'createAngsuranUser' => $createAngsuranUser
        ]);

    }

    public function createTotalPost(Request $request){
        $createAngsuranUser = $request->session()->get('createAngsuranUser');

        unset($createAngsuranUser['nominal_pinjaman']);


        Installment::create($createAngsuranUser);

        $request->session()->forget($createAngsuranUser);
        return redirect()->route('angsuran-user');
    }


    public function detail($id){
        $item = Installment::with(['type_installments','loans','users'])
            ->find($id);

        return view('pages.user.angsuran.show',[
            'item' => $item
        ]);
    }
}
