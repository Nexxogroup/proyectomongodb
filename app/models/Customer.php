<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Jenssegers\Mongodb\Model as Eloquent;


class Customer extends Eloquent implements UserInterface, RemindableInterface{

	use UserTrait, RemindableTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $collection = 'customers';

	protected $connection = 'mongodb';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	//propiedad dentro del modelo para definir los errores, puede no ser publica
	public $errors;
	//indicamos a laravel cuales campos son fillables en este modelo
	protected $fillable = array('email', 'shippingName', 'password', 'rest');
	//indicador de elementos por pagina (paginacion)
	protected $perPage = 5;

	//declaramos la relacion uno a muchos con la siguiente función.
	public function orders(){
		return $this->hasMany('Order');
	}

	//definicion del metodo isvalid para utilizar en el controlador del cliente, acepta como parametro la $data enviada desde el formulario
	public function isValid($data){
		//definimos un arreglo con las reglas que queremos que cumplan los datos recibidos, estos con los nombres de los campos que habiamos definido
		$rules = array(	'email'			=> 'required|email|unique:customers',
						'shippingName'	=> 'required|min:2|max:40|unique:customers',
						'password'		=> 'min:4|confirmed',
						'rest'			=> 'required|numeric'
		);
		//si el usuario existe:
		if ($this->exists) {
			//Evitamos que la regla 'unique' tome en cuenta el email del usuario actual
			$rules['email'].= ',email,' . $this->id;
			$rules['shippingName'].= ',shippingName,'.$this->id;
		}else{
			$rules['password'] .= '|required';
		}
		//a un objeto nuevo enviamos la clase de validacion de laravel, cuyo metodo make acepta 2 parametros, uno con los datos y otro con las reglas
		$validator = Validator::make($data, $rules);
		//con este objeto evaluamos que pase la validacion, siendo asi retorna TRUE
		if ($validator->passes()) {
			return true;
		}
		//si falla almacenamos los errores en la variable global $errors, para informarlos y retornamos FALSE al caller method
		$this->errors = $validator->errors();
		return false;
	}

	public function setPasswordAttribute($value){
		if(!empty($value)){
			$this->attributes['password'] = Hash::make($value);
		}
	}

}
