<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
class RegistersController extends Controller
{

    public function index()
    {
        // return view('auth.register');
        return view('pages.signup');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {

        $validateData = $request->all();

        $validateData['image_ktp'] = $request->file('image_ktp')->store('assests/gallery','public');
        $validateData['image_3x4'] = $request->file('image_3x4')->store('assests/gallery','public');

        //$validateData['password'] = bcrypt($validateData['password']);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        // $request->session()->flash();
        // session()->flash('success', 'Registration Success!!');
        
        return redirect()->route('login')->with('success', 'Registrasi sukses !');
    
    }
}
