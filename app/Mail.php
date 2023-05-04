<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{

    public static function generatePassword($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return date("Ymdhis").'-'.$randomString;
    }

    public static function create_token_password_reminder(int $user_id)
	{
        $nowe_haslo = self::generatePassword();

        DB::insert("INSERT INTO password_reminder (passkey,created_datatime,is_used,by_user)
                    VALUES
                    (:passkey,:created_datatime,:is_used,:by_user)"
                ,["passkey" => $nowe_haslo, "created_datatime"=> date("Y-m-d h:i:s"), "is_used"=>false, "by_user" => $user_id]);
        return $nowe_haslo;
    }

    public static function get_password_reminder()
	{
        return DB::select("SELECT * FROM password_reminder ");
    }

    public static function get_password_reminder_by_token(string $token)
	{
        return DB::select("SELECT * FROM password_reminder WHERE passkey=:passkey ",['passkey' => $token]);
    }

    public static function change_using_reminder_by_token(int $id)
	{
        DB::update("UPDATE password_reminder SET is_used=1 where passkey=:id ",["id" => $id]);
    }
}
