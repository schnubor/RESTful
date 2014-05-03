<?php

class WheelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$wheels = Wheel::get();

		return View::make('wheels.index')->with('response', $wheels);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('wheels.create');
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
			'bike_id' => 'required|numeric',
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
			return Redirect::to('wheels/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$wheel = new Wheel;
			$wheel->bike_id = Input::get('bike_id');
			$wheel->artikelbezeichnung = Input::get('artikelbezeichnung');
			$wheel->produkttyp = 'Laufrad';
			$wheel->hersteller = Input::get('hersteller');
			$wheel->herstellerartikelnummer = Input::get('herstellerartikelnummer');
			$wheel->lieferantenname = Input::get('lieferantenname');
			$wheel->lieferantenartikelnummer = Input::get('lieferantenartikelnummer');
			$wheel->verweis = Input::get('verweis');
			$wheel->gtin = Input::get('gtin');
			$wheel->taric = Input::get('taric');
			$wheel->save();

			// redirect
			Session::flash('message', 'Wheel erfolgreich angelegt!');
			return Redirect::to('wheels');
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
		$wheels = Wheel::where('id', $id)->take(1)->get();

		return View::make('wheels.single')
			->with('response', $wheels);
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
		// delete
		$wheel = Wheel::find($id);
		$wheel->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the wheel!');
		return Redirect::to('wheels');
	}


}
