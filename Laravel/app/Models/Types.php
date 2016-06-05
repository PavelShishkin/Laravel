<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class Types extends Model
{
    public static function all_types()
    {
        $types = DB::select('SELECT * FROM `shop_types`');
        return $types;
    }
    
    public static function add_types($type)
    {
        DB::insert('INSERT INTO `shop_types` (`type_name`) VALUE ("'.$type.'")');
    }
    
    public static function delete_types($id)
    { 
         DB::delete('DELETE  FROM `shop_types` WHERE `type_id`= "'.$id.'";');
		
		 $categories_id = DB::select('SELECT `categor_id` FROM `shop_categories` 
		 							  WHERE `categor_type_id` = "'.$id.'";');
		
		 foreach($categories_id as $categor_id)
		 {
			 $groups_id = DB::select('SELECT `group_id` FROM `shop_groups` 
		 							  WHERE `group_categor_id`= "'.$categor_id->{'categor_id'}.'";');
			 foreach($groups_id as $group_id)
			 {
				 DB::update('UPDATE `shop_products` SET `product_id` = 0 
				 		     WHERE `product_group_id` = "'.$group_id->{'group_id'}.'";');
			 }
			 
			 DB::delete('DELETE  FROM `shop_groups` 
			 			 WHERE `group_categor_id`= "'.$categor_id->{'categor_id'}.'";');
			 
		 }
		 
		 DB::delete('DELETE  FROM `shop_categories` WHERE `categor_type_id`= "'.$id.'";');
		 
    }
    
    public static function update_types($id,$type)
    { 
        DB::update('UPDATE `shop_types` SET  type_name = "'.$type.'" 
					WHERE type_id= "'.$id.'"');
    }
}
