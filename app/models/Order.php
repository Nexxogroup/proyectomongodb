<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Order extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $collection = 'orders';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = array('password', 'remember_token');
	
	//propiedad dentro del modelo para definir los errores, puede no ser publica
	public $errors;
	//indicamos a laravel cuales campos son fillables en este modelo
	protected $fillable = array('numero', 'deliveryDate', 'proveedor', 'status', 'descripcion', 'customerId', 'deposito');
	//indicador de elementos por pagina (paginacion)
	protected $perPage = 10;

	//declaramos la relacion uno a muchos con la siguiente funcion
	public function customer(){
		return $this->belongsTo('Customer');
	}

	public function products(){
		return $this->hasMany('Product');
	}

	public function isValid($data){
		$rules = array(	'numero' 		=> 'required|numeric|unique:orders', 
						'deliveryDate' 	=> 'required|after:date',
						'proveedor'		=> 'required'
			);
		$validator = Validator::make($data, $rules);
		if ($validator->passes()){
			return true;
		}
		$this->errors = $validator->errors();
		return false;
	}

}
