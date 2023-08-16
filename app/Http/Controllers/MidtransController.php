<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Loan;
use App\Models\Installment;
use Midtrans\Config;
use Midtrans\Notification;
class MidtransController extends Controller
{
    public function callback(Request $request)  {
        try{
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
            $splitOrderId = explode('-',$request->order_id);
            $type = $splitOrderId[0];
            $id = $splitOrderId[1];
            
            if($type == 'SIMPANAN'){
                $itemSimpanan = Deposit::findOrFail($id);
                $itemSimpanan->update(
                    [
                    'status' => 'LUNAS',
                    'tanggal_membayar' => $request->settlement_time
                    ]
                );
                $itemSimpanan->save();      
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Notification Simpanan Success'
                    ]
                ]);
            }
            
            if($type == 'PINJAMAN'){
                
                $itemPinjaman = Loan::findOrFail($id);
                
                $itemPinjaman->update([
                    'tanggal_pembayaran_administrasi' => $request->settlement_time,
                    'tanggal_acc_pinjaman ' =>  $request->settlement_time,
                    'status' => 'MENGANGSUR',
                    'setuju' => '1'
                ]);
                
                $itemPinjaman->save();
                
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Notification Pinjaman Success'
                    ]
                ]);
            }
            
            if($type == 'ANGSURAN'){
                
                $itemAngsuran = Installment::find($id);
            
                $itemAngsuran->update([
                    'status' => 'LUNAS',
                    'tanggal_pembayaran' => $request->settlement_time
                    ]);
                    
                $item = $itemAngsuran->save();
                
                $idLoans = $item->loan_id;    

                $loans = Loan::findOrFail($idLoans);
                if ($loans->nominal_hasil <= 0) {
                    $loans->update([
                        'tanggal_lunas' => $request->settlement_time,
                        'status' => 'LUNAS'
                        ]);
                    
                    $loans->save();
                }
                
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Notification Angsuran Success'
                    ]
                ]);
            }
        }
            
        }catch(Exception $e) {
            return response()->json([
            'meta' => [
                'code' => 500,
                'message' => $e->getMessage()
            ]
        ]);
        
        }
 

        
    }


    public function finishRedirect(Request $request){
        return view('pages.user.handlenotif.lunas');
    }

    public function unfinishRedirect(Request $request){
        return view('pages.user.handlenotif.unfinish');
    }

    public function errorRedirect(Request $request){
        return view('pages.user.handlenotif.gagal');
    }
}
