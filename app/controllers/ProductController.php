<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// return View::make('product');

		$products = Product::get();

		$data = json_encode($products->toArray());

		return View::make('products.index')->with('data', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('products.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name' => 'required',
			'category' => 'required',
			'price' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('api/v1/products/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$product = new Product;
			$product->name = Input::get('name');
			$product->category = Input::get('category');
			$product->price = Input::get('price');
			$product->save();

			// redirect
			Session::flash('message', 'Successfully created product!');
			return Redirect::to('api/v1/products');
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
    $product = Product::where('id', $id)->take(1)->get();
 
    return Response::json(array(
        'error' => false,
        'products' => $product->toArray()),
        200
    );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
