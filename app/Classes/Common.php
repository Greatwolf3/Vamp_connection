<?php
namespace App\Classes;

use DB;
use Request;

class Common
{


    public static function get_all_users()
    {
        $value=env('TABLE_PREFIX',null);
        $sql = DB::table($value."users")->select("*")->get();
        return $sql;
    }
    public static function get_pg($id_user)
    {
        $value=env('TABLE_PREFIX',null);
        $sql = DB::table($value."pg")->where("id", "=", $id_user)->select("*")->get();
        return $sql;
    }
    public static function get_all_pg()
    {
        $value=env('TABLE_PREFIX',null);
        $sql = DB::table($value."pg")->select("*")->get();
        return $sql;
    }
    public static function get_alleanze_pg($id_pg)
    {
        $value=env('TABLE_PREFIX',null);
        $sql = DB::table($value."alleati")
            ->join($value."tipologia_contatto as tc",$value."alleati.tipologia_alleato","=","tc.id")
            ->where($value."alleati.id_pg", "=", $id_pg)->select("alleati.*","tc.*")->get();
        return $sql;
    }
    public static function get_contatti_pg($id_pg)
    {
        $value=env('TABLE_PREFIX',null);
        $sql = DB::table($value."contatti")
            ->join($value."tipologia_contatto as tc",$value."contatti.tipologia_contatto","=","tc.id")
            ->where($value."contatti.id_pg", "=", $id_pg)->select("contatti.*","tc.*")->get();
        return $sql;
    }
    public static function get_all_clan(){

        $value=env('TABLE_PREFIX',null);
        $sql = DB::table($value."clan")->select("*")->get();
        return $sql;
    }

    public static function get_all_tipologie_contatti(){

        $value=env('TABLE_PREFIX',null);
        $sql = DB::table($value."tipologia_contatto")->select("*")->get();
        return $sql;
    }

    public static function get_all_city() {

        $value=env('TABLE_PREFIX',null);
        $result=DB::table($value.'italy_geo')->get();
        return $result;
    }





}
