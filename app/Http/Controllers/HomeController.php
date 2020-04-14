<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Classes\Common;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function superadmin(){

        return view('superadmin');
    }
    public function master(){

       $pg=Common::get_pg(Auth::user()->id);
        Session::put('role', 1);
        return view('master',["pg"=>$pg]);
    }
    public function player(){
        $pg=Common::get_pg(Auth::user()->id);
        Session::put('id_pg', $pg[0]->id);
        return view('player');
    }
}
