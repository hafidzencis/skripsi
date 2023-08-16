<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DateTime;

class DashboardController extends Controller
{   
    public function index(){

        $totalSimpananBerhasil = Deposit::where('status','LUNAS')->sum('nominal_simpanan');
        $totalPinjaman = Loan::where('status','=','MENGANGSUR')
            ->sum('nominal_pinjaman');
        $totalAngsuran = Installment::where('status','LUNAS')->sum('nominal_angsuran');
        $totalUser = DB::table('users')
                ->select(DB::raw('count(*) AS user_count'))
                ->where('roles','=','USER')
                ->get();
        // checking jatuh tempo
        
        $query = DB::table('loans')
            ->join('users','users.id','=','loans.user_id')
            ->where('status','=', 'MENGANGSUR')
            ->get();
        // dd($query);
        $data = [];
        foreach ($query as $q) {
            $tenorDatas = $q->tenor;
            $AdministrasiDate = $q->tanggal_pembayaran_administrasi;
            $tahunTime = new DateTime($AdministrasiDate);
            $finalTahun = $tahunTime->format('Y-m-d');
            $createdAt = $q->created_at;
            $datetime = new DateTime($createdAt); 
            $date = $datetime->format('Y-m-d');
            $dateCreatedAt = explode("-",$date);
            $DateNow = date("Y-m-d");
            $dateAngsuran = explode("-", $DateNow);
            
            $administrasiData = explode("-",$finalTahun); 
            // array_push($data,$q->user_id);
            if ($tenorDatas == 12 && $administrasiData[0]+1 == $dateAngsuran[0] && $administrasiData[1] >= $dateAngsuran[1] && $administrasiData[2] >= $dateAngsuran[2]) {
                array_push($data, $q->nama);
            }
    
            if ($tenorDatas == 24 && $administrasiData[0]+2 == $dateAngsuran[0]  && $administrasiData[1] >= $dateAngsuran[1] && $administrasiData[2] >= $dateAngsuran[2]) {
                array_push($data, $q->nama);
            }
        }
        // dd($data);


        
        
        
        // dd($query);
        return view('pages.admin.dashboard',[
            'totalSimpananBerhasil' => $totalSimpananBerhasil,
            'totalPinjaman' => $totalPinjaman,
            'totalAngsuran' =>  $totalAngsuran,
            'totalUser' => $totalUser[0]->user_count,
            'userJatuhTempo' => $data
            // 'userMengangsur' => $query,
            // 'dateAngsuran' => $splitLine,
            // 'dateCreatedAt' => $splitSpasi,
            // 'tenorData'=> $tenorDatas,
            // 'administrasiData'=> $splitTahun
        ]);


    }
}
