<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePassword;
use App\Http\Requests\Admin\UbahDataDiriRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index(){

        // dd(Auth::user());
        return view('pages.admin.ubahdatadiri.index',[
            'item' => Auth::user()
        ]);
    }

    public function edit(){

        return view('pages.admin.ubahdatadiri.update',[
            'item' => Auth::user()
        ]);
    }

    public function update(UbahDataDiriRequest $request){
        $validateData = $request->all();

        if ( $request->image_3x4) {
            $validateData['image_3x4'] = $request->file('image_3x4')->store('assets/gallery','public');
           
        }
        
        if($request->image_ktp){
           $validateData['image_ktp'] = $request->file('image_ktp')->store('assets/gallery','public');  
        }

        $item = User::findOrFail($validateData['id']);
        $item->update($validateData);
        return redirect()->route('ubahdatadiri-index');
    }


    public function editPassword(){
        return view('pages.admin.ubahdatadiri.changepassword');
    }

    public function changePassword(ChangePassword $request){
        $validateData = $request->all();

        if(!Hash::check($validateData['oldPassword'], auth()->user()->password)){
            return redirect()->route('ubahdatadiri-index')->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($validateData['password'])
        ]);
        return redirect()->route('ubahdatadiri-index')->with("status", "Password changed successfully!");
    }
}
