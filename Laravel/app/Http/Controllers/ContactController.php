<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//Подключаю модель 
use App\Models\Messages;

class ContactController extends Controller
{
    public $name;       //Имя
    public $email;      //Почта
    public $text;       //Текст сообщения
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

        //Проверка почты 
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL ) != true)
        {
            $this->errors['email'] = "Почта введена некорректно";
        }
    }
	
    public function add_message_db()
	{
		if(sizeof($this->errors) === 0)
        {
            //Добавляю сообщение в БД
            Messages::add_message($this->name,$this->email,$this->text);
            //Обнуляю введенные данные 
            $this->name     = "";
            $this->text     = "";
            $this->email    = "";
			
			$this->flag = true;
        }
		else
		{
			$this->flag = false;
		}
	}
	
    public function contact()
    {   
        $this->name     = array_get($_POST,'name');    //Имя
        $this->email    = array_get($_POST,'email');   //Почта
        $this->text     = array_get($_POST,'text');    //Текст сообщения
		
        $this->required();
        $this->add_message_db();
		
        //массивы для передачи данных в представление 
        $array_contact = ['name'  => $this->name,
                          'email' => $this->email,
                          'text'  => $this->text,
						  'errors'=> $this->errors,
						  'flag'  => $this->flag];
       
        return view("contact",$array_contact);
    }
}
