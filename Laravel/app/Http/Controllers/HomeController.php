<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//Подключаю модели
use App\Models\Products;
use App\Models\Categories;
use App\Models\Types;
use App\Models\Groups;
use App\Models\Messages;
use App\Models\Purchases;

use App\Http\Controllers\MailController;


class HomeController extends Controller
{
    public function index()
    { 
        return view("index");
    }
	
	public function register()
	{
		return view("register");
	}
	
    public function login()
    { 
        return view("login");
    }
   
    public function contact()
    { 
        return view("contact");
    }
    
    public function product($id)
    { 
        $products = Products::products_categor($id);
        return view("product",['products'=>$products]);
    }
	
	public function single($id)
    { 
		$products =  Products::get_product_id($id);
		$array   = ['products' => $products];
        return view("single",$array);
    }
	
	public function checkout()
	{
		return view("checkout");
	}
	
	public function product_add_checkout($id)
	{
		
		$products =  Products::get_product_id($id);
		
		$array   = ['products' => $products];
		return view("checkout",$array);
	}
	
	public function purchase($id)
	{
		
		$products =  Products::get_product_id($id);
		
		$array   = ['products' => $products,
				   	'product_id' => $id];
		return view("purchase",$array);
	}
	
    
    //------------------------------АДМИНКА---------------------------------------------
    public function inspection()
    {
		//Проверка входа пользователя
        if(empty($_SESSION['user_id']))
        {
            header('Location: 404');
        }
    }
    
    public function admin()
    { 
        $this->inspection(); 
		
		$message_count 	   = Messages::get_count_message_day();
		$message_count_all = Messages::get_count_message_all();
		
		$purch_count       = Purchases::get_count_purch_day();
		$purch_count_all   = Purchases::get_count_purch_all();
		
		$array = ['message_count'    => $message_count,
				  'message_count_all'=> $message_count_all,
				  'purch_count'      => $purch_count,
				  'purch_count_all'  => $purch_count_all];
	
        return view("admin.admin",$array);
    }
    
    public function admin_exit()
    { 
		$this->inspection();
        unset($_SESSION['user_id']);
        session_destroy(); 
        return view("index");
    }
    
    public function admin_goods()
    {   
		$this->inspection();
    	return view("admin.goods");
    }
    
    public function admin_categories($id)
    { 
        $this->inspection();
        
        $categories = Categories::categories_type_id($id);
        $array = ['categories'      => $categories,
                  'categor_type_id' => $id];
      
        return view("admin.categories",$array);
    }
    
    public function admin_groups($type_id,$categor_id)
    { 
        $this->inspection();
        
        $groups = Groups::groups_categor_id($categor_id);
        $array = ['groups'     => $groups,
                  'categor_id' => $categor_id,
				  'type_id'    => $type_id];
     
        return view("admin.groups",$array);
    }
	
	public function admin_products($type_id,$categor_id,$group_id)
    { 
        $this->inspection();
        $products = Products::all_products_group_id($group_id);
   		$array = ['type_id'    => $type_id,
				  'categor_id' => $categor_id,
				  'group_id'   => $group_id,
				  'products'   => $products];
		
        return view("admin.products",$array);
    }
	
	public function admin_purchases()
	{
		$purchases = Purchases::all_purchase();
		$array    = ['purchases' => $purchases];
		return view("admin.purchases",$array);
	}
	
	public function admin_messages()
	{
		$messages = Messages::all_message();
		$array 	  = ['messages' => $messages];
		return view("admin.messages",$array);
	}
	
	public function admin_messages_read($id)
	{
		$messages = Messages::get_message_id($id);
		$array 	  = ['messages' => $messages];
		return view("admin.read",$array);
	}
}
