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
		$numero = Input::get('numero');
		$dataOrder = Order::where('numero', '=', $numero)->get();
		return View::make('admin/products/new_product', $dataOrder);
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
			
			//si es valida se la asignamos al cliente:
			$product->fill($data);
			//y lo guardamos
			$product->save();
			
			$order = Order::where('numero', '=', $product->idOrder)->first();
			$productlist = Product::where('idOrder', '=', $product->idOrder)->paginate();
			//retornamos la vista de la accion show para mostrar la información guardada
			return View::make('admin/products/productlist', array('productlist' => $productlist, 'order' => $order));//)->with('order', $product->idOrder);
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
		return " muestra la informacion del producto";
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
