<?php

class Admin_UsersController extends \BaseController {
	//Controlador para todas las operaciones crud de los usuarios, creado mediante php artisan controller:make Admin_UserController

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//funcion inicial del controlador de usuarios
	public function index()
	{
		//con la funcion paginate se asignan la cantidad de registros por pagina, por defecto 15 (la configuracion se puede cambiar)
		$customers = Customer::paginate();
		//se envia la informacion a la vista en lista
		return View::make('admin/customers/customerlist')->with('customers', $customers);// solo para administrador
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	//funcion que se invoca para desplegar el formulario de creacion de clientes
	public function create()
	{
		$customer = new Customer;
		$form_data 	= array('route' => array('admin.users.store'), 'method' => 'POST');
		$action 	= 'Crear';
		$accion		= 'New Customer';
		return View::make('admin/users/new_cust', compact('customer', 'form_data', 'action', 'accion'));	// Cliente y admin
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	//funciona para almacenar los datos capturados del formulario
	public function store()
	{
		//primero creamos un nuevo objeto para nuestro usuario cliente en este caso
		$customer = new Customer;
		//recibimos la data enviada por el usuario en una nueva variable
		$data = Input::all();

		//revisamos si la data es valida
		if ($customer->isValid($data)) {
			//si es valida se la asignamos al cliente
			$customer->fill($data);
			//y lo guardamos
			$customer->save();
			//retornamos la vista de la accion ahow para mostrar la información guardada
			return Redirect::route('admin.users.show', array($customer->id));
		}else {
			//si contiene error, regresara a la vista de la accion create con los datos y errores encontrados
			return Redirect::route('admin.users.create')->withInput()->withErrors($customer->errors);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)	// Cliente y admin
	{
		//se recupera el elemento que se desea mostrar con la funcion find por medio del parametro $id
		$customer = Customer::find($id);
		//se evalua si es nulo, lo que significa que no trajo ningun registro que corresponda a ese $id
		if (is_null($customer)) {
			//en ese caso nos lleva a error 404
			App::abort(404);
		}
		//en caso que si exista, envia la información a la vista del detalle (customer)
		$orders = Order::where('customerId', '=', $id)->get();
		return View::make('admin/customers/customer', array('customer' => $customer, 'orders' => $orders));
		//return View::make('admin/customers/customer')->with('customer', $customer);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	//editar un registro
	public function edit($id){	// Solo para administrador
		////se recupera el elemento que se desea mostrar con la funcion find por medio del parametro $id
		$customer = Customer::find($id);
		//se evalua si es nulo, lo que significa que no trajo ningun registro que corresponda a ese $id
		if (is_null($customer)) {
			//en ese caso nos lleva a error 404	
			App::abort(404);
		}
		//en caso de que si exista, envia la info a la vista del formulario new_cust para ser editada
		//return View::make('admin/users/new_cust')->with('customer', $customer);
		$form_data 	= array('route' => array('admin.users.update', $customer->id), 'method' => 'PATCH');
		$action 	= 'Editar';
		$accion		= 'Edit customer';

		return View::make('admin/customers/new_cust', compact('customer', 'form_data', 'action', 'accion'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//se recupera la info del registro que se desea actualizar con el metodo find por medio de la variable $id
		$customer = Customer::find($id);
		//se evalua si es nulo, lo que significa que no trajo ningun registro que corresponda a ese $id
		if (is_null($customer)) {
			//en ese caso nos lleva a error 404	
			App::abort(404);
		}

		//si existe, trae toda la data enviada
		$data = Input::all();
		//revisamos si la data es valido
		if ($customer->isValid($data)) {
			//si es valida se asigna
			$customer->fill($data);
			//guardamos el usuario
			$customer->save();
			//y redireccionamos a la accion show para mostrar el usuario
			return Redirect::route('admin.users.show', array($customer->id));
		}else{
			//en caso de error en la data, regresar a la accion edit con los datos y errores encontrados
			return Redirect::route('admin.users.edit', $customer->id)->withInput()->withErrors($customer->errors);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function actionVerCliente($id){
		//se recupera el elemento que se desea mostrar con la funcion find por medio del parametro $id
		$customer = Customer::find($id);
		//se evalua si es nulo, lo que significa que no trajo ningun registro que corresponda a ese $id
		if (is_null($customer)) {
			//en ese caso nos lleva a error 404
			App::abort(404);
		}
		$orders = Order::where('customerId', '=', $id)->get(); //arreglo con todas las ordenes pertenecientes al id.
		//en caso que si exista, envia la información a la vista del detalle del cliente incluyendo las ordenes
		return View::make('admin/adminCust', array('customer' => $customer, 'orders' => $orders));
	}

}