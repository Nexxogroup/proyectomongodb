<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//muestra el formulario de login
Route::get('login', 'UserLogin@showLogin');

//valida los datos de inicio de sesión 
Route::post('login', 'UserLogin@postLogin');

//Rutas privadas solo para autenticados:	
Route::group(array('before' => 'auth'), function()
{
	//ruta principal generada con el proyecto
	Route::get('/', function()
	{
		return View::make('login');
	});
	//para cerrar sesion
	Route::get('logout', 'UserLogin@logout');
});

//ruta del controlador de recursos creada

Route::get('admin/customerDetail/{id}', 'Admin_UsersController@actionVerCliente');

Route::resource('admin/users', 'Admin_UsersController');

Route::get('adminorderlist/{id}', 'Admin_OrdersController@actionAdministrarLista');

Route::get('admin/orderlist/{id}', 'Admin_OrdersController@actionMostrarLista');

Route::get('admin/createpl', 'Admin_OrdersController@actionPackingList');

Route::resource('admin/orders', 'Admin_OrdersController');

Route::get('admin/addproduct', 'Admin_ProductsController@addProducto');

Route::get('admin/products/new_product', 'Admin_ProductsController@create');

Route::resource('admin/products', 'Admin_ProductsController');