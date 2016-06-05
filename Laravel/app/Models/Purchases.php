<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Purchases extends Model
{
   public static function add_purchase($name,$phone,$adress,$product_id)
   {
	   DB::insert('INSERT INTO `shop_purchases` (`purch_name`,`purch_phone`,`purch_adress`,`purch_product_id`,`purch_date`)
	   VALUES
	   ("'.$name.'","'.$phone.'","'.$adress.'","'.$product_id.'","'.date('y.m.d').'");');
   }
   
	public static function all_purchase()
   {
	   $purchases = DB::select('SELECT * FROM `shop_purchases`');
	   return $purchases;
   }
  
	
   public static function get_count_purch_day()
   {
	   $purch_count = DB::select('SELECT count(`purch_id`) as count FROM `shop_purchases` WHERE `purch_date` = "'.date('y.m.d').'";');
	   return $purch_count;
   }
	
   public static function get_count_purch_all()
   {
	   $purch_count = DB::select('SELECT count(`purch_id`) as count_all FROM `shop_purchases`');
	   return $purch_count;
   }
}
