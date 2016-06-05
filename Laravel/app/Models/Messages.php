<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Messages extends Model
{
    public static function add_message($name,$email,$message)
    {
        DB::insert("INSERT INTO `shop_messages` 
                            (`message_name`,`message_email`,`message_text`,`message_date`) 
                    VALUES
                            ('".$name."','".$email."','".$message."','".date("y.m.d")."')");
    }
	
	public static function all_message()
	{
		$messages = DB::select('SELECT * FROM `shop_messages`;');
		return $messages;
	}
	
	public static function get_message_id($id)
	{
		$messages = DB::select('SELECT * FROM `shop_messages` WHERE `message_id` = "'.$id.'";');
		return $messages;
	}
	
	
	public static function get_count_message_day()
	{
		$message_count = DB::select('SELECT count(`message_id`) as count FROM `shop_messages` 
									  WHERE `message_date` = "'.date("y.m.d").'";');
		return $message_count;
	}
	
	public static function get_count_message_all()
	{
		$message_count_all = DB::select('SELECT count(`message_id`) as count_all FROM `shop_messages`');
		return $message_count_all;
	}
}
