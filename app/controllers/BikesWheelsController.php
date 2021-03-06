<?php

class BikesWheelsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$bike = Bike::find($id);
		$bikeWheels = Bike::find($id)->wheels;
		$allWheels = Wheel::get();

		foreach($bikeWheels as $bikeWheel){
			$verweis = new Verweis();
			$verweis->verweis_id = $bikeWheel->verweis;
			$verweis->href = URL::to('wheels/' . $bikeWheel->verweis);
			$bikeWheel->verweis =  $verweis;	
		}

		$data = array('bike' => $bike, 'response' => $bikeWheels, 'allWheels' => $allWheels);

		return View::make('bikewheels.index', $data);
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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($bikeId, $wheelId)
	{
		$wheel = Wheel::whereRaw('id=? and bike_id=?', array($wheelId, $bikeId))->get();
		return $wheel;
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
