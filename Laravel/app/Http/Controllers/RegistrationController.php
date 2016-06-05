<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

//Подключаю модель Users
use App\Models\Users;

class RegistrationController extends Controller
{
    public $name;           //Имя
    public $phone;          //Телефон
    public $email;          //Почта
    public $password;       //Пароль  
    public $errors = [];    //Массив с ошибками 
	public $flag;           //Флаг
    
    //Валидация введенных данных 
    public function required()
    {  
        //Проверка имени
        if(mb_strlen($this->name) < 2)
        { 
           $this->errors['name'] = "Некорректное имя"; 
        } 
        
        //Проверка пароля
        if(mb_strlen($this->password) < 5)
        { 
           $this->errors['password'] = "Пароль должен состоять минимум из 5 символов"; 
        } 
        
        //Проверка почты 
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL ) != true)
        {
            $this->errors['email'] = "Почта введена некорректно";
        }
        
        //Проверка телефона 
        if(!preg_match("/^(\+7|8)[0-9]{10,10}+$/", $this->phone))
        { 
           $this->errors['phone'] = "Введен некорректный телефон"; 
        } 
        
        //Проверка логина
        $users = Users::all_users();
     
        foreach($users as $user)
        {
            if($this->email === $user->{'user_email'})
            {
                $this->errors['email'] = "Такой E-mail уже используется";
                break;
            }
        }
    }
	
	//Добаление пользователя в БД 
	public function add_user_db()
	{
		if(sizeof($this->errors) === 0)
        {
	 		Users::add_user($this->name,$this->email,$this->phone,$this->password);
			$this->flag = true; //Пользователь добавлен в БД 
		}
		else
		{
			$this->flag = false; //Есть ошибки 
		}
	}
	
	public function register_success($mail)
	{
		
		Users::success_user($mail);
		header("location: /login");
	}
	
    public function register()
    {  
        $this->name     = array_get($_POST,'name');    //Имя
        $this->phone    = array_get($_POST,'phone');   //Телефон
        $this->email    = array_get($_POST,'email');   //Почта
        $this->password = array_get($_POST,'password');//Пароль

        $this->required();   //Проверка введенных данных
        $this->add_user_db();//Добавление пользователя в БД 
		
        //Массив для передачи данных в представление 
        $array_register = ['name'     => $this->name,
                           'phone' 	  => $this->phone,
                           'email' 	  => $this->email,
                           'password' => $this->password,
						   'errors'	  => $this->errors,
						   'flag'     => $this->flag];
		
        return view("register",$array_register);
    }
	
}
