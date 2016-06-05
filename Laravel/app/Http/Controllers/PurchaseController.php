<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//Подключаю модель 
use App\Models\Purchases;
use App\Models\Products;
class PurchaseController extends Controller
{
    public $name;       //Имя
	public $product_id; //Имя
    public $phone;      //Почта
    public $adress;     //Текст сообщения
    public $errors = [];//Массив с ошибками
	public $flag;		//Флаг
    
    //Валидация введенных данных 
    public function required()
    {  
        //Проверка имени
        if(mb_strlen($this->name) < 2)
        { 
           $this->errors['name'] = "Некорректное имя"; 
        } 
		
		//Проверка телефона 
        if(!preg_match("/^(\+7|8)[0-9]{10,10}+$/", $this->phone))
        { 
           $this->errors['phone'] = "Введен некорректный телефон"; 
        } 
		
        //Проверка адресса
        if(mb_strlen($this->adress) < 5)
        {
            $this->errors['adress'] = "Ведите адресс/индекс/допол.инф";
        }
    }
	
    public function add_purchase_db()
	{
		if(sizeof($this->errors) === 0)
        {
            //Добавляю сообщение в БД
            Purchases::add_purchase($this->name,$this->phone,$this->adress,$this->product_id);
			
            //Обнуляю введенные данные 
            $this->name     = "";
            $this->phone    = "";
            $this->adress   = "";
			
			$this->flag = true;
        }
		else
		{
			$this->flag = false;
		}
	}
	
    public function purchase()
    {   
		
		$this->product_id = array_get($_POST,'product_id');
        $this->name     = array_get($_POST,'name');    //Имя
        $this->phone    = array_get($_POST,'phone');   //Телефон
        $this->adress   = array_get($_POST,'adress');    //Текст сообщения
		
        $this->required();
		
        $this->add_purchase_db();
		$products =  Products::get_product_id($this->product_id );
        //массивы для передачи данных в представление 
        $array = ['name'  => $this->name,
                          'phone' => $this->phone,
                          'adress'  => $this->adress,
						  'errors'=> $this->errors,
						  'flag'  => $this->flag,
				          'product_id' => $this->product_id,
						  'products' => $products];
       
        return view("purchase",$array);
    }
}
