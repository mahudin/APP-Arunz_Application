<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Http\Response;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function is_after_attention_more_information(string $email): int
    {
        $dane = DB::select('SELECT is_online FROM users where "email"=:email ',['email'=>$email]);
        return isset($dane[0]->is_online)? 1:0;
    }

    public static function check_by_login(string $array): int
    {
		$dane = DB::select('SELECT id FROM users where "email"=:login LIMIT 1', ['login'=>$array]);
		return $dane ? 1:0;
    }

    public static function authenticate_user(array $array): int
    {
		$dane = DB::select('SELECT id FROM users WHERE email=:login AND password=:password ',['login'=>$array['email'],'password'=>$array['password']]);
		return $dane ? 1:0;
    } 

    public static function add_user(array $post): int
    {
		$params = ['email','password','uname','surname','sex','phone','zip_code','state','city','street','code_country','walking_for','walking_count','walking_because'
			,'nr_card','date_card','uname_card','surname_card','cvv_cvc','join_date','ip_adress','is_online'];
		$values='';
		
		for($i=0; $i<=21; $i++) $values.=$i<21 ? '\''.$post[$params[$i]].'\',' : $post[$params[$i]];

			DB::insert('INSERT INTO users
		  (email,password,uname,surname,sex,phone,zip_code,state,city,street,code_country,walking_for,walking_count,walking_because,nr_card,date_card,
		  uname_card,surname_card,cvv_cvc,join_date,ip_adress,is_online)
		VALUES('.$values.') ');
		return true;	
    }

    public static function update_profile_user(array $dane, int $id): void
	{
        DB::update("UPDATE users
        ".(isset($dane['email'])? "SET email=\"".$dane['email']."\" ":"").   "
        ".(isset($dane['password'])? ",password=\"".$dane['password']."\" ":"").   "
        ".(isset($dane['phone'])?   ",phone=\"".$dane['phone']."\" ":"").   "
        ".(isset($dane['city'])?    ",city=\"".$dane['city']."\" ":"").   "
        ".(isset($dane['nr_card'])? ",nr_card=\"".$dane['nr_card']."\" ":"").   "
        ".(isset($dane['uname'])? ",uname=\"".$dane['uname']."\" ":"").   "
        ".(isset($dane['surname'])? ",surname=\"".$dane['surname']."\" ":"").   "
        ".(isset($dane['uname_card'])? ",uname_card=\"".$dane['uname_card']."\" ":"").   "
        ".(isset($dane['surname_card'])? ",surname_card=\"".$dane['surname_card']."\" ":"").   "
        WHERE id=".$id."
        ");
    }

    public static function update_profile_additional(array $dane, int $id): void
	{
        DB::update("UPDATE users
        ".(isset($dane['walking_because'])? "SET email=\"".$dane['walking_because']."\" ":""). "
        ".(isset($dane['walking_for'])? ",walking_for=\"".$dane['walking_for']."\" ":""). "
        ".(isset($dane['shirt_size'])?   ",shirt_size=\"".$dane['shirt_size']."\" ":"").  "
        ".(isset($dane['walking_count'])? ",city=\"".$dane['walking_count']."\" ":"").   "
        is_online=1
        WHERE id=".$id."
        ");
    }

	
    public static function get_user_by_email($email): array
    {
	    return DB::select('SELECT * FROM users WHERE email=:email
        ORDER BY id LIMIT 1 ',['email'=>$email]);
    }

    public static function get_user_by_email_and_password(string $email, string $pass): array
    {
        return DB::select('SELECT * FROM users WHERE email=:email and
        password=:pass ORDER BY id LIMIT 1 ',['email'=>$email,'pass'=>$pass]);
    }

    public static function drop_account(int $id): void
    {
        DB::delete('DELETE FROM users where id=:id',['id'=>$id]);
        DB::delete('DELETE FROM users_of_marathons where idu=:id',['id'=>$id]);
    }

    public static function change_password(string $haslo, int $id): void
	{
        DB::update("UPDATE users SET password=\"".$haslo."\"  WHERE id=".$id." ");
    }


}
