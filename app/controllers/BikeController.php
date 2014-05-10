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
		$bikes = Bike::get();
		return View::make('bikes.create')->with('bikes', $bikes);
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
			return Redirect::to('bikes/create')
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
			return Redirect::to('bikes');
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
		$bikes = Bike::find($id);

		return View::make('bikes.edit')
			->with('bike', $bikes);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
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
			return Redirect::to('bikes/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$bike = Bike::find($id);
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
			Session::flash('message', 'Bike erfolgreich editiert!');
			return Redirect::to('bikes');
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
		$bike = Bike::find($id);
		$bike->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the bike!');
		return Redirect::to('bikes');
	}


}
