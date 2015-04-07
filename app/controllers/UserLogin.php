<?php 
//controlladora de la autenticacion de usuarios
class UserLogin extends BaseController{	

	//Muestra el formulario para login
	public function showLogin(){
	//verifica que el usuario no este autenticado
		if(Auth::check()){
			//Si esta autenticado lo enviamos a la raiz para la bienvenida
			return Redirect::to('/');
			//return Redirect::route('admin.users.show', $customer->id);
			//return View::make('admin/users/customer')->with('customer', $customer);
		}
		return View::make('login');
	}


	public function postLogin(){
		//Guardamos los datos de login en un arreglo
		$userdata = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);
		//validamos los datos y ademas mandamos como un segundo parametro la opcion de recordar el usuario
		if(Auth::attempt($userdata, Input::get('rememberme'))){
			//si los datos son validos nos enviara a la pantalla de bienvenida
			$customer = Customer::where('email', '=', Input::get('email'))->first();
			//$customer = DB::collection('customers')->where('email', Input::get('email'))->first();
			Session::put('idcustomer', $customer->id);
			return Redirect::route('admin.users.show', $customer->id); // me retorna con el id del customer en la url
			//return View::make('admin/users/customer')->with('customer', $customer); //me retorna con get login
		}
		//En caso de que la Autenticación falle, manda un mensaje al formulario de login y tambien regresamos los valores enviados con withInput()
		return Redirect::back()->with('mensaje_error', 'Tus datos son incorrectos')
			->withInput();
	}



	public function logout(){
		Auth::logOut();
		Session::flush();
		return Redirect::to('login')
			-> with('mensaje_error', 'Tu sesión ha sido cerrada');
	}



	public function showSignup(){
		//verificamos que no sea un usuario autenticado
		if(Auth::check()){
			//Si esta autenticado lo enviamos a la raiz para la bienvenida
			return Redirect::to('/');
		}
		return View::make('signup');
	}

}