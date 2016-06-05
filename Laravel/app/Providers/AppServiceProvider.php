<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Types;
use App\Models\Categories;
use App\Models\Groups;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
	
    public function boot()
    {
		/* Передаю во все представления данные о шапке документа */
		$types      = Types::all_types();             
        $categories = Categories::all_categories();   
        $groups     = Groups::all_groups();  
    
        $header_array=['types'      => $types,
                       'categories' => $categories,
                       'groups'     => $groups];
		
        view()->share($header_array);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
