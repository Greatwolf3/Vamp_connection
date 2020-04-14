<?php


namespace App\Http\Controllers;
use App\Classes\Common;
use Auth;
use Illuminate\Http\Request;
use Session;
class PlayerController extends Controller
{
    public function crea_pg()
    {

        $clan=Common::get_all_clan();
        $citta=Common::get_all_city();
        if(!session()->get("id_pg")) {
            return view("pg.crea_pg", ["clan" => $clan, "citta" => $citta]);
        } else{
            return redirect()->route('player');
        }
    }
    public function crea_pg_admin()
    {
        $users=Common::get_all_users();
        $clan=Common::get_all_clan();
        $citta=Common::get_all_city();
        return view("pg.crea_pg_admin",["clan"=>$clan,"citta"=>$citta,'utenti'=>$users]);
    }

    public function add_alleato()
    {
        $id_user = Auth::user()->id;
        $pg=Common::get_pg($id_user);
        $tipologie=Common::get_all_tipologie_contatti();
        if(session()->get("id_pg")) {
            return view("pg.add_alleato", ["tipologie" => $tipologie, "pg" => $pg]);
        } else {
            return view('pg.error',['utente'=>Auth::user()]);
        }
    }
    public function add_contatto_generico()
    {
        $id_user = Auth::user()->id;
        $pg=Common::get_pg($id_user);
        $tipologie=Common::get_all_tipologie_contatti();
        if(session()->get("id_pg")) {
        return view("pg.add_contatto_generico",["tipologie"=>$tipologie,"pg"=>$pg]);
        } else {
            return view('pg.error',['utente'=>Auth::user()]);
        }
    }

    public function seleziona_pg_admin()
    {

        $pg=Common::get_all_pg();
        return view("pg.sel_pg",["pg"=>$pg]);
    }
    public function mem_sel_pg_admin(Request $request)
    {
        $id_pg=$request->input('id_pg');
        $pg=Common::get_pg($id_pg);
        Session::forget('id_pg');
        Session::forget('nome_pg');
        Session::put('id_pg',$id_pg);
        Session::put('nome_pg',$pg[0]->nome_pg);
        return redirect()->route('master');
    }

    public function reset_sel_pg_admin (){
        Session::forget('id_pg');
        return redirect()->route('master');
    }
}
