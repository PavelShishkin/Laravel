<?php

namespace App\Models;
//Подключаю контроллер отправки сообщения
use App\Http\Controllers\MailController;
use Illuminate\Database\Eloquent\Model;

//БД
use DB;
//Шифрование
use Crypt; 
//Отправка сообщений через SMTP gmail.com
use Mail;

class Users extends Model
{
	
    //Добавление пользователя 
    public static function add_user($name,$email,$phone,$password)
    {
		DB::insert(
            "INSERT INTO `shop_users` 
                (`user_name`,`user_email`,`user_phone`,`user_password`,`user_status_registr`) 
             VALUE 
                ('".$name."','".$email."','".$phone."','".Crypt::encrypt($password)."',0)");
		
		$href = url('').'/login/'.Crypt::encrypt($email);
		
		//Отправка сообщения об успешной регистрации на почту 
        Mail::send('message.message',array('href'=>$href), 
			function($message) use ($email) {
			$message->from('shopforlabs@gmail.com', 'Shopin');
			$message->to($email, 'Shopin')->subject('Подтверждение регистрации.');
		});
    }
	
	public static function success_user($mail)
	{
		$email = Crypt::decrypt($mail);
		DB::update("UPDATE `shop_users` SET `user_status_registr` = 1 
					WHERE `user_email` = '".$email."';");
	}
    
    //Получение всех пользователей  
    public static function all_users()
    {
        $users = DB::select("SELECT * FROM `shop_users`");
        return $users;
    }
}
