<?php


namespace App\Http\Controllers;
use Auth;
use App\Classes\Common;
use Session;
class UserController extends Controller
{
    public function connection()
    {
        $id_user = Auth::user()->id;

        if(session()->get("id_pg")){
        $pg=Common::get_pg(session()->get("id_pg"));
        $contatti=Common::get_contatti_pg(session()->get("id_pg"));;
        $alleati=Common::get_alleanze_pg(session()->get("id_pg"));
        return view("user.connection",["pg"=> $pg,"alleati"=>$alleati,"contatti"=>$contatti]);
        } else {
            return view('pg.error',['utente'=>Auth::user()]);
        }
    }

    public function get_pg($id_user)
    {
        $sql = DB::table("pg")->where("id_user", "=", $id_user)->select("*")->get();
        return $sql;
    }
}
