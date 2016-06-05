<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Groups extends Model
{
    //все группы товаров
    public static function all_groups()
    {
        $groups = DB::select('select * from `shop_groups`');
        return $groups;
    }
    
    //показываю все группы товаров по id категории
    public static function groups_categor_id($categor_id)
    {
        $groups = DB::select('select * from `shop_groups` where group_categor_id='.$categor_id);
        return $groups;
    }
    
    //добавление группы 
    public static function add_group($group_name,$group_categor_id)
    {
        DB::insert("insert into `shop_groups` (`group_name`,`group_categor_id`) values ('".$group_name."','".$group_categor_id."')");
		
		
    }
    
    //удаление группы 
    public static function delete_group($group_id)
    {
        DB::delete('delete from `shop_groups` where group_id ='.$group_id);
		
		DB::update('UPDATE `shop_products` SET `product_id` = 0 
				    WHERE `product_group_id` = "'.$group_id.'";');
		
    }
    
    //изменение группы 
    public static function update_group($id,$name)
    {
        DB::update('update `shop_groups` set group_name="'.$name.'" where group_id='.$id);
		
		
    }
}
