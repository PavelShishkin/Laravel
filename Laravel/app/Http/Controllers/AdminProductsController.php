<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//Подключаю модель Categories
use App\Models\Products;

class AdminProductsController extends Controller
{
	public $new_product_name;
	public $new_product_price;
	public $new_product_image;
	public $new_product_comment;
	public $new_product_type;
	public $new_product_brand;
	public $errors = [];
	
	
	//Валидация введенных данных 
    public function required()
    {  
        
        if(mb_strlen($this->new_product_name) < 2)
        { 
           $this->errors['new_product_name'] = "Некорректное имя"; 
        } 
		
		if(mb_strlen($this->new_product_comment) < 5)
		{
			$this->errors['new_product_comment'] = "Некорректное описание";
		}
		
		if(mb_strlen($this->new_product_type) < 4)
		{
			$this->errors['new_product_type'] = "Артикул состоит из 5 символов (1 - #, 4 - цифры)";
		}
		
		if(mb_strlen($this->new_product_brand) < 2)
        { 
           $this->errors['new_product_brand'] = "Некорректное название"; 
        }
		
		if($_FILES["new_product_image"]["size"] > 1024*3*1024)
   		{
     		  $this->errors['new_product_image'] = "Размер файла превышает три мегабайта";
		}
		elseif(!is_uploaded_file($_FILES["new_product_image"]["tmp_name"]))
		{
			$this->errors['new_product_image'] = "Ошибка загрузки файла";
		}
	}
	
	public function add_products($group_id,$categor_id,$type_id)
	{
		$this->new_product_name    = array_get($_POST,'new_product_name');
		$this->new_product_price   = array_get($_POST,'new_product_price');
		$this->new_product_comment = array_get($_POST,'new_product_comment');
		$this->new_product_brand   = array_get($_POST,'new_product_brand');
		$this->new_product_image   = array_get($_POST,'new_product_image');
		$this->new_product_type    = array_get($_POST,'new_product_type');
		
		$this->required();
		
		
		if(sizeof($this->errors) === 0)
		{
			$array = ['product_name'    => $this->new_product_name,
					  'product_price'   => $this->new_product_price,
					  'product_text'    => $this->new_product_comment,
					  'product_brand'  => $this->new_product_brand ,
					  'product_image'   => $_FILES["new_product_image"]["name"],
					  'product_type'    => $this->new_product_type,
					  'product_group_id'=> $group_id
					 ];
			
			move_uploaded_file($_FILES["new_product_image"]["tmp_name"], "image_products/".$_FILES["new_product_image"]["name"]);
	
			Products::add_product($array);
			
		    header('Location: '.url('admin/categories/'.$type_id.'/groups/'.$categor_id.'/products/'.$group_id));  
		}
		else
		{
			$products = Products::all_products_group_id($group_id);
			
			$array = ['group_id'   => $group_id,
					  'categor_id' => $categor_id,
					  'type_id'    => $type_id,
					  'modal'      => 'on',
					  'flag'       => false,
					  'errors'     => $this->errors,
					  'products'   => $products];
			
			return view('admin.products',$array);
		}
	}
	
	public function delete_products($group_id,$categor_id,$type_id)
	{
		$products = Products::delete_products($_POST['product_id']);
		header('Location: '.url('admin/categories/'.$type_id.'/groups/'.$categor_id.'/products/'.$group_id));
	}
	
	public function update_products($group_id,$categor_id,$type_id)
	{
		if($_FILES["new_product_image"]["size"] > 1024*3*1024)
   		{
     		  $product_image =  $_POST['new_product_image_2'];
		}
		elseif(!is_uploaded_file($_FILES["new_product_image"]["tmp_name"]))
		{
			   $product_image =  $_POST['new_product_image_2'];
		}
		else
		{
			$product_image = $_FILES["new_product_image"]["name"];
		}
		
		$array = ['product_name'        => $_POST['new_product_name'],
					  'product_price'   => $_POST['new_product_price'],
					  'product_text'    => $_POST['new_product_comment'],
					  'product_brand'   => $_POST['new_product_brand'] ,
					  'product_image'   => $product_image,
					  'product_type'    => $_POST['new_product_type'],
					 ];
		
		$products = Products::update_products($_POST['product_id'],$array);
		header('Location: '.url('admin/categories/'.$type_id.'/groups/'.$categor_id.'/products/'.$group_id));
	}
	
	public function modal_2_products($product_id,$group_id,$categor_id,$type_id)
	{
		$product_modal_2 = Products::get_product_id($product_id);
		$products = Products::all_products_group_id($group_id);
		
		$array = ['group_id'   => $group_id,
				  'categor_id' => $categor_id,
				  'type_id'    => $type_id,
				  'modal'      => 'on_2',
				  'product_modal_2'   => $product_modal_2,
				  'products'          => $products];
		
		return view('admin.products',$array);
	}
}