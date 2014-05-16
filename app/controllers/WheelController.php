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

		foreach($wheels as $wheel){
			$verweis = new Verweis();
			$verweis->verweis_id = $wheel->verweis;
			$verweis->href = URL::to('wheels/'. $wheel->verweis);
			$wheel->verweis = $verweis;
		}

		return View::make('wheels.index')->with('response', $wheels);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$bikes = Bike::get();
		$wheels = Wheel::get();

		$data = array('bikes' => $bikes, 'wheels' => $wheels);

		return View::make('wheels.create', $data);
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
			'AAP805' => 'required',
			'AAO677' => 'required',
			'AAO676' => 'required',
			'AAO735' => 'required',
			'AAO736' => 'required',
			'verweis' => 'required|numeric',
			'AAO663' => 'required',
			'AAD931' => 'required|numeric'
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
			$wheel->AAP805 = Input::get('AAP805');
			$wheel->AAF542 = 'Laufrad';
			$wheel->AAO677 = Input::get('AAO677');
			$wheel->AAO676 = Input::get('AAO676');
			$wheel->AAO735 = Input::get('AAO735');
			$wheel->AAO736 = Input::get('AAO736');
			$wheel->verweis = Input::get('verweis');
			$wheel->AAO663 = Input::get('AAO663');
			$wheel->AAD931 = Input::get('AAD931');
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
		$allWheels = Wheel::get();

		$verweis = new Verweis();
		$verweis->verweis_id = $wheels[0]->verweis;
		$verweis->href = URL::to('wheels/'. $wheels[0]->verweis);
		$wheels[0]->verweis = $verweis;

		$data = array('response' => $wheels, 'allWheels' => $allWheels);

		return View::make('wheels.single', $data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$wheels = Wheel::find($id);
		$allWheels = Wheel::get();
		$bikes = Bike::get();

		$data = array('wheels' => $wheels, 'bikes' => $bikes, 'allWheels' => $allWheels);

		return View::make('wheels.edit', $data);
			
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
			'bike_id' => 'required|numeric',
			'AAP805' => 'required',
			'AAO677' => 'required',
			'AAO676' => 'required',
			'AAO735' => 'required',
			'AAO736' => 'required',
			'verweis' => 'required|numeric',
			'AAO663' => 'required',
			'AAD931' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('wheels/'. $id . 'create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$wheel = Wheel::find($id);
			$wheel->bike_id = Input::get('bike_id');
			$wheel->AAP805 = Input::get('AAP805');
			$wheel->AAF542 = 'Laufrad';
			$wheel->AAO677 = Input::get('AAO677');
			$wheel->AAO676 = Input::get('AAO676');
			$wheel->AAO735 = Input::get('AAO735');
			$wheel->AAO736 = Input::get('AAO736');
			$wheel->verweis = Input::get('verweis');
			$wheel->AAO663 = Input::get('AAO663');
			$wheel->AAD931 = Input::get('AAD931');
			$wheel->save();

			// redirect
			Session::flash('message', 'Wheel erfolgreich editiert!');
			return Redirect::to('wheels');
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
		// delete
		$wheel = Wheel::find($id);
		$wheel->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the wheel!');
		return Redirect::to('wheels');
	}


}
