<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserManagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('nama')
        ->get();
        return view('pages.admin.manageusers.index',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('pages.admin.manageusers.resetpassword',[
            'user' => $user
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $item = User::findOrFail($id);
        if ( $request->password == $request->password_confirmation) {
            $item->password = Hash::make($request->password);
            $item->save();
            
            return redirect()->route('usermanages.index')->with('successResetPassword','Berhasil reset password');
        }

        return back()->with('userDiffPassword','Password dengan Password Confirmation Beda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::find($id);
        $nama = $item->nama;
        DB::table('deposits')->where('user_id',$id)->delete();
        DB::table('installments')->where('user_id',$id)->delete();
        DB::table('loans')->where('user_id',$id)->delete();
        User::find($id)->delete();

        return redirect()->route('usermanages.index')->with('successDeleteUser'," Sukses Menghapus User $nama");

    }
}
