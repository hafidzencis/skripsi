<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDashbordController extends Controller
{
    
    public function indexDashboardUser(){
        $totalSimpananBerhasil = Deposit::where('status','LUNAS')
        ->where('user_id','=',Auth::user()->id)
        ->sum('nominal_simpanan');

        $totalPinjaman = Loan::where('user_id','=',Auth::user()->id)
        ->where('status','=','MENGANGSUR')
        ->sum('nominal_pinjaman');
        
        $totalAngsuran = Installment::where('status','LUNAS')
        ->where('user_id','=',Auth::user()->id)
        ->sum('nominal_angsuran');

        $query = DB::table('loans')
                ->where('user_id','=',Auth::user()->id)
                ->where('status','=', 'MENGANGSUR')
                ->first();
        $tenorDatas = $query->tenor;
        $AdministrasiDate = $query->tanggal_pembayaran_administrasi;
        $tahunTime = new DateTime($AdministrasiDate); 
        $finalTahun = $tahunTime->format('Y-m-d');
        $splitTahun = explode("-",$finalTahun);  
        // dd($splitTahun);

        $createdAt = $query->created_at;

        $datetime = new DateTime($createdAt); 
        $date = $datetime->format('Y-m-d');

        $splitSpasi = explode("-",$date);

        $DateNow = date("Y-m-d");
        $splitLine = explode("-", $DateNow);

        return view('pages.user.dashboard',[
            'totalSimpananBerhasil' => $totalSimpananBerhasil,
            'totalPinjaman' => $totalPinjaman,
            'totalAngsuran' =>  $totalAngsuran,
            'dateAngsuran' => $splitLine,
            'dateCreatedAt' => $splitSpasi,
            'tenorData'=> $tenorDatas,
            'administrasiData'=> $splitTahun
        ]);
    }
}
