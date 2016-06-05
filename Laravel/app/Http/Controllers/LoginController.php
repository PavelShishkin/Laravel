<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

//Подключаю модель Users
use App\Models\Users;
//Шифрование
use Crypt; 

class LoginController extends Controller
{
    public $email;
    public $password;
    public $errors =[];
	
    //валидация введенных данных 
    public function required()
    {   
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
        
        //если ошбок нет проверяю введенные данные с данными из БД 
        if(sizeof($this->errors) === 0)
        {
			$users = Users::all_users();
			
            foreach($users as $user)
            {
                $password = Crypt::decrypt($user->{'user_password'});
                $login    = $user->{'user_email'};
                
                //если логин и пароль не совпадают (иначе если совпадают)
                if($this->password !== $password and $this->email !== $login)
                {
                    $this->errors['password'] = "Неправильный логин или пароль"; 
                }
                elseif($this->password !== $password and $this->email === $login)
                {
                    $this->errors['password'] = "Неверно указан пароль"; 
                }
                elseif($this->password === $password and $this->email !== $login)
                {
                    $this->errors['password'] = "Неверно указан логин"; 
                }
                elseif($this->password === $password and $this->email === $login)
                {
                    //проверяю статус регистрации
                    if($user->{'user_status_registr'} === 0)
                    {
                        $this->errors['password'] = "Для входа подтвердите свой адрес электронной почты";
                        break;
                    }
                    else
                    {
                        $_SESSION['user_id'] = $user->{'user_id'};
                        header("Location: /");
                    }
                }
            }
           
        }
    }
    
    public function login()
    {
        $this->email    = array_get($_POST,'email');   //почта
        $this->password = array_get($_POST,'password');//пароль
		
        $this->required();
        
        //массивы для передачи данных в представление 
        $array_login = ['email'    => $this->email,
                        'password' => $this->password,
					    'errors'   => $this->errors,
					    'flag'     => false];
             
        return view("login",$array_login);
    }
}
