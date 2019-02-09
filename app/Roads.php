<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;

class Roads extends Model
{
    public static function get_marathons_user($name)
    {
	$dane=DB::select('SELECT * FROM marathons
				JOIN users_of_marathons ON users_of_marathons.idm=marathons.id
				JOIN users ON users_of_marathons.idu=users.id
 			WHERE users.email=:login ORDER BY marathons.time_term ASC ', ['login'=>$name]);
	return $dane;
    }

    public static function get_marathons_all_available()
    {
	$dane=DB::select('SELECT * FROM marathons 
				JOIN roads_of_marathons ON roads_of_marathons.idm=marathons.idm
				JOIN users_of_marathons ON users_of_marathons.idm=marathons.idm
			');
	return $dane;
    }

    public static function get_marathons_all()
    {
        $dane=DB::select('SELECT * FROM marathons');
        return $dane;
    }

    public static function get_past_marathons_all()
    {
        $dane=DB::select('SELECT * FROM marathons where date_term < :date_term and time_term < :time_term ',
            ['date_term'=>date("Y-m-d"),'time_term'=>date("H:i:s")]);
        return $dane;
    }


    public static function add_user_to_road($trasa,$id)
    {
        $dane1=DB::select('SELECT * FROM marathons where title=:trasa ',['trasa'=>$trasa]);
        foreach($dane1 as $dana1){
            DB::insert('INSERT INTO users_of_marathons (idm,idu,status) values(:idm,:idu,:status) ',
                ['idm'=>$dana1->id,'idu'=>$id,'status'=>5]);
        }

        return 1;
    }
}
