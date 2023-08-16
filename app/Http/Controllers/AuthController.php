<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function index()  {
        return view('pages.signin');
    }

    public function store(LoginRequest $request)
    {
        // $credentials = $request->all();

        if( Auth::attempt( ['email' => $request->email, 'password' => $request->password] ))  {


            $request->session()->regenerate();

            if (Auth::user()->roles == 'ADMIN'){
                return redirect()->route('admin-dashboard');
            }

            else if (Auth::user()->roles == 'USER'){
                return redirect()->route('index-dashboard-user');
            }

        }

        return redirect()->route('login')->with('loginError','email atau password salah');
        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
