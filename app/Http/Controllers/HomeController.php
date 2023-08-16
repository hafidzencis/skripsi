<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    //
    public function index()  {
        return view('pages.home');
    }

    public function cobaindex(){
        return view('layouts.admin-table-new');
    }
}
