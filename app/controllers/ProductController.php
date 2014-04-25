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
 
    return Response::json(array(
        'error' => false,
        'products' => $products->toArray()),
        200
    );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$product = new Product;
    $product->name = Request::get('name');
    $product->category = Request::get('category');
    $product->price = Request::get('price');
 
    // Validation and Filtering is sorely needed!!
    // Seriously, I'm a bad person for leaving that out.
 
    $product->create();
 
    return Response::json(array(
      'error' => false,
      'message' => 'stored.'),
      200
    );
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Make sure current user owns the requested resource
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
