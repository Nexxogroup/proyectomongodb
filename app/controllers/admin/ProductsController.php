<?php

class Admin_ProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin/products/list');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return var_dump(Input::all());
		/*$numero = Input::get('numero');
		$dataOrder = Order::where('numero', '=', $numero)->get();
		return View::make('admin/products/new_product', $dataOrder);*/
	}

	public function addProducto($numero)
	{
		return "ay vamos";//View::make('admin/products/new_product')->with('idOrder', $numero);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//primero creamos un nuevo objeto para nuestro producto
		$product = new Product;
		//recibimos la data enviada por el usuario en una nueva variable
		$data = Input::all();
		//revisamos si la data es valida
		if ($product->isValid($data)) {
			//generamos y agregamos el atributo $totalproducto al arreglo $data
			$totalproducto = $data["cantidad"]*$data["precio"];
			$data["totalproducto"] = "$totalproducto";
			//agregamos un grid donde almacenaremos la imagen, el cual recupera el archivo desde la ubicacion dada
			$grid = DB::getGridFS();
			$name = Input::file('attachmentFile')->getRealPath();
			$idImagen = $grid->storeFile($name);//Input::file("attachmentFile")->getRealPath());
			//luego regreso la variable a su estado original para poder almacenar el array $data
			$data["attachmentFile"] = Input::file('attachmentFile')->getClientOriginalName();
			//le asignamos toda la data al cliente:
			$data["idImagen"] = "$idImagen";
			//return $data;
			$product->fill($data);
			//y lo guardamos
			$product->save();
			//buscamos los datos de la orden a la que pertenece este producto
			$order = Order::where('numero', '=', $product->idOrder)->first();
			//buscamos todos los productos pertenecientes a esta orden
			$productlist = Product::where('idOrder', '=', $product->idOrder)->paginate();
			//retornamos la vi ta de la accion show para mostrar la información guardada
			return View::make('admin/products/productlist', array('productlist' => $productlist, 'order' => $order));//*/
		}else {
			//si contiene error, regresara a la vista de la accion create con los datos y errores encontrados
			return Redirect::route('admin.products.create')->with('order', $product->idOrder)->withInput()->withErrors($product->errors);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//se recupera el elemento que se desea mostrar con la funcion find por medio del parametro $id
		$product = Product::find($id);
		//recuperamos la imagen con
		$grid = DB::getGridFS();
		$imagen = $grid->findOne($product->idImagen);//new MongoId($product->idImagen));//$grid->findOne($product->idImagen);
		header('Content-type: image/jpg;');
		echo $imagen->getBytes();
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "muestra el formulario de edicion de productos";
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
}