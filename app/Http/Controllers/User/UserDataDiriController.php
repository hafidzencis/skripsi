<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePassword;
use App\Http\Requests\Admin\UbahDataDiriRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDataDiriController extends Controller
{

    public function indexDataDiriUser(){

        // dd(Auth::user());
        return view('pages.user.ubahdatadiri.index',[
            'item' => Auth::user()
        ]);
    }

    public function editDataDiriUser(){

        return view('pages.user.ubahdatadiri.update',[
            'item' => Auth::user()
        ]);
    }

    public function updateDataDiriUser(UbahDataDiriRequest $request){
        $validateData = $request->all();

        if ( $request->image_3x4) {
            $validateData['image_3x4'] = $request->file('image_3x4')->store('assets/gallery','public');
        }

        if ($request->image_ktp) {
            $validateData['image_ktp'] = $request->file('image_ktp')->store('assets/gallery','public');
        }

        $item = User::findOrFail($validateData['id']);
        $item->update($validateData);
        return redirect()->route('ubahdatadiri-user');
    }


    public function editChangePasswordUser(){
        return view('pages.user.ubahdatadiri.changepassword');
    }

    public function updateChangePasswordUser(ChangePassword $request){
        $validateData = $request->all();

        if(!Hash::check($validateData['oldPassword'], auth()->user()->password)){
            return redirect()->route('ubahdatadiri-user')->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($validateData['password'])
        ]);
        return redirect()->route('ubahdatadiri-user')->with("status", "Password changed successfully!");
    }
}
