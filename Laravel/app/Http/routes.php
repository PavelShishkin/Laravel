<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//---------Главная страница
//GET
Route::get('/',
           ['uses'=>'HomeController@index']
          );

//---------Регистрация 
//GET
Route::get('registration',
           ['uses'=>'HomeController@register']
          );
//POST
Route::post("registration",
            ['uses'=>'RegistrationController@register'] 
           ); 
//GET //подтверждение адреса эл почты 
Route::get("login/{mail}",
            ['uses'=>'RegistrationController@register_success'] 
          ); 

//---------Вход 
//GET
Route::get('login',
           ['uses'=>'HomeController@login']
          );
//POST
Route::post('login',
           ['uses'=>'LoginController@login']
          );


//---------Контакты
//GET
Route::get('contact',
           ['uses'=>'HomeController@contact']
          );
//POST
Route::post('contact',
           ['uses'=>'ContactController@contact']
          );

//---------Продукты
//GET
Route::get('product/{id}',
           ['uses'=>'HomeController@product']
          )->where('id','[0-9]+');
//GET
Route::get('single/{id}',
           ['uses'=>'HomeController@single']
          )->where('id','[0-9]+');

//GET
Route::get('checkout',
           ['uses'=>'HomeController@checkout']
          );
//GET
Route::get('product/checkout/{id}',
           ['uses'=>'HomeController@product_add_checkout']
          )->where('id','[0-9]+');
//GET
Route::get('purchase/{id}',
           ['uses'=>'HomeController@purchase']
          )->where('id','[0-9]+');
//POST
Route::post('purchase',
           ['uses'=>'PurchaseController@purchase']
          )->where('id','[0-9]+');

//---------Админка-------------------------------------------------------------
//GET 
Route::get('admin',
           ['uses'=>'HomeController@admin']
          );
//GET //выход
Route::get('admin/exit',
           ['uses'=>'HomeController@admin_exit']
          );

//Меню товаров
//GET
Route::get('admin/goods',
           ['uses'=>'HomeController@admin_goods']
          );
//POST //добавление 
Route::post('admin/goods/add',
            ['uses'=>'AdminGoodsController@add_goods']
           );
//POST //удаление
Route::post('admin/goods/delete',
            ['uses'=>'AdminGoodsController@delete_goods']
           );
//POST //изменение
Route::post('admin/goods/update',
            ['uses'=>'AdminGoodsController@update_goods']
           );


//Категории товаров
//GET
Route::get('admin/categories/{id}',
           ['uses'=>'HomeController@admin_categories']
          )->where('id','[0-9]+');
//POST //добавление
Route::post('admin/categories/add',
           ['uses'=>'AdminCategoriesController@add_categories']
          );
//POST //удаление
Route::post('admin/categories/delete',
           ['uses'=>'AdminCategoriesController@delete_categories']
          );
//POST //изменение
Route::post('admin/categories/update',
           ['uses'=>'AdminCategoriesController@update_categories']
          );

//Группы товаров 
//GET
Route::get('admin/categories/{type_id}/groups/{categor_id}',
           ['uses'=>'HomeController@admin_groups']
          )->where(['type_id'=>'[0-9]+','categor_id'=>'[0-9]+']);

//POST //добавление
Route::post('admin/groups/add/{type_id}',
           ['uses'=>'AdminGroupsController@add_groups']
          )->where('type_id','[0-9]+');
//POST //удаление
Route::post('admin/groups/delete/{type_id}',
           ['uses'=>'AdminGroupsController@delete_groups']
          )->where('type_id','[0-9]+');
//POST //изменение
Route::post('admin/groups/update/{type_id}',
           ['uses'=>'AdminGroupsController@update_groups']
          )->where('type_id','[0-9]+');


//Продукты 
//GET
Route::get('admin/categories/{type_id}/groups/{categor_id}/products/{group_id}',
           ['uses'=>'HomeController@admin_products']
          )->where(['type_id'=>'[0-9]+','categor_id'=>'[0-9]+','group_id'=>'[0-9]+']);

//POST //добавление
Route::post('admin/products/add/{group_id}/{categor_id}/{type_id}',
           ['uses'=>'AdminProductsController@add_products']
          )->where(['type_id'=>'[0-9]+','categor_id'=>'[0-9]+','group_id'=>'[0-9]+']);
//POST //удаление
Route::post('admin/products/delete/{group_id}/{categor_id}/{type_id}',
           ['uses'=>'AdminProductsController@delete_products']
          )->where(['type_id'=>'[0-9]+','categor_id'=>'[0-9]+','group_id'=>'[0-9]+']);

Route::get('admin/products/modal_2/{product_id}/{group_id}/{categor_id}/{type_id}',
           ['uses'=>'AdminProductsController@modal_2_products']
          )->where(['product_id'=>'[0-9]+','type_id'=>'[0-9]+','categor_id'=>'[0-9]+','group_id'=>'[0-9]+']);
//POST //гзвфеу
Route::post('admin/products/update/{group_id}/{categor_id}/{type_id}',
           ['uses'=>'AdminProductsController@update_products']
          )->where(['type_id'=>'[0-9]+','categor_id'=>'[0-9]+','group_id'=>'[0-9]+']);


//покупки
//GET
Route::get('admin/purchases',
		['uses'=>'HomeController@admin_purchases']
	);

//Сообщения
//GET
Route::get('admin/messages',
		['uses'=>'HomeController@admin_messages']
	);
//GET
Route::get('admin/messages/read/{id}',
		['uses'=>'HomeController@admin_messages_read']
	)->where('type_id','[0-9]+');
