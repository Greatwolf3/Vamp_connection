<?php


namespace App\Http\Controllers;
use App\Classes\Common;
use Illuminate\Http\Request;
use DB;
class ApiController extends Controller
{
    public  function save_pg(Request $request)
    {
        $request->validate([
            'nome_pg'=>'required',
            'id_clan' => 'required',
            'id_citta' => 'required',
            'user'=>'required'
            // 'description_email'=>'min:3',
        ], [
            'nome_pg.required'=>trans('validation.nome_png_required'),
            'id_clan.required'=>trans('validation.id_clan_required'),
            'id_citta.required'=>trans('validation.id_citta_required'),
            'user.required'=>trans('validation.user_required'),
        ]);
        $result=null;
        $id_user = $request->input("id_user");
        $nome_giocatore = $request->input("nome_giocatore");
        $nome_pg = $request->input("nome_pg");
        $id_clan = $request->input("id_clan");
        $id_citta = $request->input("id_citta");
        $attivo = $request->input("attivo");
        if($attivo=='on') {$attiva=1;} else {$attiva=0;}
        $result = DB::table('pg')->insert(['id_user' => $id_user, 'nome_pg' => $nome_pg, 'id_clan' => $id_clan, 'id_citta' => $id_citta,'attivo'=> $attiva]);
       $role=DB::table('users')->where('id', $id_user)->take(1)->select('role')->get();
      if ($role[0]->role==1){
          return redirect('crea_pg_admin');
      } elseif ($role[0]->role==3) {
          return redirect('crea_pg');
      }

    }

    public  function save_png(Request $request)
    {

        $request->validate([
            'nome_png'=>'required',
            'id_clan' => 'required',
            'id_citta' => 'required',
            'user'=>'required',
            // 'description_email'=>'min:3',
        ], [
            'nome_png.required'=>trans('validation.nome_png_required'),
            'id_clan.required'=>trans('validation.id_clan_required'),
            'id_citta.required'=>trans('validation.id_citta_required'),
            'user.required'=>trans('validation.user_required'),
        ]);

        $result=null;
        $id_user = $request->input("id_user");
        $nome_giocatore = $request->input("nome_giocatore");
        $nome_png = $request->input("nome_png");
        $id_clan = $request->input("id_clan");
        $id_citta = $request->input("id_citta");
        $attivo = $request->input("attivo");
        if($attivo=='on') {$attiva=1;} else {$attiva=0;}
        $result = DB::table('png')->insert(['id_user' => $id_user, 'nome_png' => $nome_png, 'id_clan' => $id_clan, 'id_citta' => $id_citta]);
        $role=DB::table('users')->where('id', $id_user)->take(1)->select('role')->get();
        if ($role[0]->role==1){
            return redirect('crea_png_admin');
        } elseif ($role[0]->role==3) {
            return redirect('crea_pg');
        }

    }
    public function save_alleato(Request $request){
        $result=null;
        $id_pg = $request->input("id_pg");
        $nome_alleato = $request->input("nome_alleato");
        $tipologia = $request->input("tipologia");
        $result = DB::table('alleati')->insert(['id_pg' => $id_pg, 'nome_alleato' => $nome_alleato, 'tipologia_alleato' => $tipologia]);
        if($result) {
            return redirect()->route('add_alleato')->with('msg', 'Alleato aggiunto');
        } else {
            return redirect()->back()->with('msg', 'Alleato non aggiunto');
        }
    }
    public function save_contatto_generico(Request $request){
        $result=null;
        $id_pg = $request->input("id_pg");
        $nome_contatto = $request->input("nome_contatto");
        $tipologia = $request->input("tipologia");
        $result = DB::table('contatti')->insert(['id_pg' => $id_pg, 'nome_contatto' => $nome_contatto, 'tipologia_contatto' => $tipologia]);
        if($result) {
            return redirect()->route('add_contatto_generico')->with('msg', 'Contatto aggiunto');
        } else {
            return redirect()->back()->with('msg', 'Contatto non salvato');
        }
    }
}
