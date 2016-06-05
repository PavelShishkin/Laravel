<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//Подключаю модель Categories
use App\Models\Categories;

class AdminCategoriesController extends Controller
{

    public $categor_id;       //id категории
    public $categor_type_id;  //id меню (Женщинам, Мужчинам, Детям и т.д)
    public $categor_name;     //Название категории
    public $categor_new_name; //Новое название категории
    
    //Функция добавления новой категории в БД
    public function add_categories()
    {
        $this->categor_new_name = array_get($_POST,'categor_new_name');
        $this->categor_type_id  = array_get($_POST,'categor_type_id');
        
        $categor_error = require_error_text($this->categor_new_name);
        
        if($categor_error === true)
        {
            Categories::add_category($this->categor_new_name,$this->categor_type_id);
            header('Location:'.url('admin/categories/'.$this->categor_type_id));
        }
        else
        {
            $categories = Categories::categories_type_id($this->categor_type_id );
            
            $array = ['categor_error'   => 'Некорректное название категории',
                      'categor_type_id' => $this->categor_type_id,
                      'categories'      => $categories];
      
            return view("admin.categories",$array);
        }
    }
    
    //Функция удаления категории из БД
    public function delete_categories()
    {
        $this->categor_id      = array_get($_POST,'categor_id');
        $this->categor_type_id = array_get($_POST,'categor_type_id');
        
        Categories::delete_category($this->categor_id);
        header('Location:'.url('admin/categories/'.$this->categor_type_id));
    }
    
    //Функция изменения категории
    public function update_categories()
    {
        $this->categor_id      = array_get($_POST,'categor_id');
        $this->categor_name    = array_get($_POST,'categor_name');
        $this->categor_type_id = array_get($_POST,'categor_type_id');
        
        Categories::update_category($this->categor_id,$this->categor_name);
        header('Location:'.url('admin/categories/'.$this->categor_type_id)); 
    }
}
