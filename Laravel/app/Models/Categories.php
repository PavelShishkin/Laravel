<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB; //подключил БД

class Categories extends Model
{
    //функция вывода всех категорий
    public static function all_categories()
    {
        $categories = DB::select('SELECT * FROM `shop_categories`;');
        return $categories;
    }
    
    //показываю категорию по id type 
    public static function categories_type_id($id)
    {
        $categories=DB::select("SELECT * FROM `shop_categories` WHERE categor_type_id=".$id);
        return $categories;
    }
    
    //показываю группы вещей по id категории 
    public static function groups($categor_id)
    {
        $groups=DB::select("SELECT * FROM `shop_groups` 
							WHERE group_categor_id='.$categor_id.'");
        return $groups;
    }
    
    //Добавление категории 
    public static function add_category($categor_name,$categor_type_id)
    {
        DB::insert('INSERT INTO `shop_categories` (`categor_name`,`categor_type_id`) 
                    VALUES ("'.$categor_name.'","'.$categor_type_id.'");');
    }
    
    //Удаление категории 
    public static function delete_category($categor_id)
    {
        DB::delete('DELETE FROM `shop_categories` WHERE categor_id = "'.$categor_id.'";');
		
		$groups_id = DB::select('SELECT `group_id` FROM `shop_groups` 
								 WHERE group_categor_id = "'.$categor_id.'";');
			
		foreach($groups_id as $group_id)
		{
			 DB::update('UPDATE `shop_products` SET `product_id` = 0 
				 		     WHERE `product_group_id` = "'.$group_id->{'group_id'}.'";');
		}
		
		DB::delete('DELETE FROM `shop_groups` WHERE group_categor_id = "'.$categor_id.'";');
    }
    
    //Изменение категории 
    public static function update_category($categor_id,$categor_name)
    {
        DB::update('UPDATE `shop_categories` SET categor_name = "'.$categor_name.'"
                    WHERE categor_id = "'.$categor_id.'";');
    }
    
    
}
