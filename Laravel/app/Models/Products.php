<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Products extends Model
{
    //показываю проукты по id категории 
    public static function products_categor($id)
    {
        $products = DB::select("SELECT * FROM `shop_products` WHERE product_group_id=".$id);
        return $products;
    }
	
	public static function get_product_id($id)
	{
		$products = DB::select("SELECT * FROM `shop_products` WHERE product_id=".$id);
        return $products;
	}
		
	public static function add_product($product)
	{
		
		DB::insert(
		"INSERT INTO `shop_products` 
			(`product_group_id`,`product_name`,`product_price`,`product_image`,
			 `product_text`,`product_type`,`product_brand`) 
		 VALUES 
		 	('".$product['product_group_id']."','".$product['product_name']."','".$product['product_price']."', '".$product['product_image']."','".$product['product_text']."','".$product['product_type']."',
		 	'".$product['product_brand']."');");
	}
	
	public static function all_products_group_id($group_id)
	{
		$products = DB::select('SELECT * FROM `shop_products` WHERE `product_group_id` = "'.$group_id.'";');
		return $products;
	}
	
	public static function delete_products($product_id)
	{
		$products = DB::select('DELETE FROM `shop_products` WHERE `product_id` = "'.$product_id.'";');
		return $products;
	}
	
	public static function update_products($product_id,$product)
	{
		DB::insert(
		"UPDATE  `shop_products` SET 
			 `product_name` = '".$product['product_name']."',
			 `product_price`= '".$product['product_price']."',
			 `product_image`= '".$product['product_image']."',
			 `product_text` = '".$product['product_text']."',
			 `product_type` = '".$product['product_type']."',
			 `product_brand`= '".$product['product_brand']."'
		 WHERE `product_id` = '".$product_id."';");
	}
}
