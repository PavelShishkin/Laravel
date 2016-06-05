<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Groups;

class AdminGroupsController extends Controller
{
    public $id;
    public $categor_id;
    public $name;
    public $new_group;
      
    public function add_groups($type_id)
    {
        $this->new_group      = array_get($_POST,'new_group');
        $this->categor_id     = array_get($_POST,'categor_id');
        
        Groups::add_group($this->new_group,$this->categor_id);
        header('Location:'.url('admin/categories/'.$type_id .'/groups/'.$this->categor_id)); 
    }
    
    public function delete_groups($type_id)
    {
        $this->id         = array_get($_POST,'id');
        $this->categor_id = array_get($_POST,'categor_id');
        
        Groups::delete_group($this->id);
        header('Location:'.url('admin/categories/'.$type_id .'/groups/'.$this->categor_id)); 
    }
    
    public function update_groups($type_id)
    {
        $this->id             = array_get($_POST,'id');
        $this->name           = array_get($_POST,'name');
        $this->categor_id     = array_get($_POST,'categor_id');
        
        Groups::update_group($this->id,$this->name);
		
        header('Location:'.url('admin/categories/'.$type_id .'/groups/'.$this->categor_id)); 
    }
}
