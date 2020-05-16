<?php


namespace App\Http\Controllers;
use App\Classes\Common;
use Auth;
use Illuminate\Http\Request;
use Session;
class EventoController extends Controller
{
    public function crea_evento_admin()
    {

       /* $clan = Common::get_all_clan();
        $citta = Common::get_all_city();
        if (!session()->get("id_pg")) {
            return view("pg.crea_pg", ["clan" => $clan, "citta" => $citta]);
        } else {
            return redirect()->route('player');
        }  */
        return view("evento.crea_evento_admin");
    }
}
