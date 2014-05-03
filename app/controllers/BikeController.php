<?php

class BikeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$bikes = Bike::find(1)->wheels;
		$bikes = Bike::get();

		return View::make('bikes.index')
			->with('response', $bikes);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bikes.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$rules = array(
			'artikelbezeichnung' => 'required',
			'hersteller' => 'required',
			'herstellerartikelnummer' => 'required',
			'lieferantenname' => 'required',
			'lieferantenartikelnummer' => 'required',
			'verweis' => 'required|numeric',
			'gtin' => 'required',
			'taric' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('api/v1/bikes/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$bike = new Bike;
			$bike->artikelbezeichnung = Input::get('artikelbezeichnung');
			$bike->produkttyp = 'Fahrrad';
			$bike->hersteller = Input::get('hersteller');
			$bike->herstellerartikelnummer = Input::get('herstellerartikelnummer');
			$bike->lieferantenname = Input::get('lieferantenname');
			$bike->lieferantenartikelnummer = Input::get('lieferantenartikelnummer');
			$bike->verweis = Input::get('verweis');
			$bike->gtin = Input::get('gtin');
			$bike->taric = Input::get('taric');
			$bike->save();

			// redirect
			Session::flash('message', 'Bike erfolgreich angelegt!');
			return Redirect::to('api/v1/bikes');
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
		$bikes = Bike::where('id', $id)->take(1)->get();

		return View::make('bikes.single')
			->with('response', $bikes);
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
