<?php

class BikeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bikes = Bike::get();

		foreach($bikes as $bike){
			$verweis = new Verweis();
			$verweis->verweis_id = $bike->verweis;
			$verweis->href = URL::to('bikes/'. $bike->verweis);
			$bike->verweis = $verweis;
		}
		

		return View::make('bikes.index')->with('response', $bikes);
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
			return Redirect::to('bikes/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$bike = new Bike;
			$bike->AAP805 = Input::get('AAP805');
			$bike->AAF542 = 'Fahrrad';
			$bike->AAO677 = Input::get('AAO677');
			$bike->AAO676 = Input::get('AAO676');
			$bike->AAO735 = Input::get('AAO735');
			$bike->AAO736 = Input::get('AAO736');
			$bike->verweis = Input::get('verweis');
			$bike->AAO663 = Input::get('AAO663');
			$bike->AAD931 = Input::get('AAD931');
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
		$allBikes = Bike::get();

		$verweis = new Verweis();
		$verweis->verweis_id = $bikes[0]->verweis;
		$verweis->href = URL::to('bikes/'. $bikes[0]->verweis);
		$bikes[0]->verweis = $verweis;

		$data = array('response' => $bikes, 'allBikes' => $allBikes);

		return View::make('bikes.single', $data);
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
		$allBikes = Bike::get();

		$data = array('bike' => $bikes, 'allBikes' => $allBikes);
		
		return View::make('bikes.edit', $data);
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
			return Redirect::to('bikes/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$bike = Bike::find($id);
			$bike->AAP805 = Input::get('AAP805');
			$bike->AAF542 = 'Fahrrad';
			$bike->AAO677 = Input::get('AAO677');
			$bike->AAO676 = Input::get('AAO676');
			$bike->AAO735 = Input::get('AAO735');
			$bike->AAO736 = Input::get('AAO736');
			$bike->verweis = Input::get('verweis');
			$bike->AAO663 = Input::get('AAO663');
			$bike->AAD931 = Input::get('AAD931');
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
