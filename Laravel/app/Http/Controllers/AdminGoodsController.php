<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Types;
use App\Models\Products;
use App\Models\Categories;

class AdminGoodsController extends Controller
{
    public $id;		 
    public $type;	 
    public $new_type;
   
	//Добавить
    public function add_goods()
    {
        $this->new_type = array_get($_POST,'new_type');
        Types::add_types($this->new_type);
        header('Location: '.url('admin/goods'));         
    }
    
	//Удалить
    public function delete_goods()
    {
        $this->id = array_get($_POST,'id');
        Types::delete_types($this->id);
        header('Location: '.url('admin/goods'));         
    }
    
	//Изменить
    public function update_goods()
    {
        $this->id   = array_get($_POST,'id');
        $this->type = array_get($_POST,'type');
        
        Types::update_types($this->id,$this->type);
        header('Location: '.url('admin/goods'));         
    }
}
