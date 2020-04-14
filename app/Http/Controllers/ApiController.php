<?php


namespace App\Http\Controllers;
use App\Classes\Common;
use Illuminate\Http\Request;
use DB;
class ApiController extends Controller
{
    public  function save_pg(Request $request)
    {
        $result=null;
        $id_user = $request->input("id_user");
        $nome_giocatore = $request->input("nome_giocatore");
        $nome_pg = $request->input("nome_pg");
        $id_clan = $request->input("id_clan");
        $id_citta = $request->input("id_citta");
        $result = DB::table('pg')->insert(['id_user' => $id_user, 'nome_giocatore' => $nome_giocatore, 'nome_pg' => $nome_pg, 'id_clan' => $id_clan, 'id_citta' => $id_citta]);
        return $result;
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
