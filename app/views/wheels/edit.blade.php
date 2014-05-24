@extends('layout.main')

@section('title')
  <title>Wheel editieren</title>
@stop

@section('headline')
  <h1>Wheel editieren <span class="method">PUT/PATCH</span></h1>
@stop

<?php
  $bikes_array = array(); 
  $wheels_array = array();
?>

@foreach($bikes as $bike)
  <?php $bikes_array[$bike->id] = $bike->AAP805; ?>
@endforeach

@foreach($allWheels as $wheel)
  <?php $wheels_array[$wheel->id] = $wheel->AAP805; ?>
@endforeach

@section('content')
  <div class="form-wrapper">
    {{ Form::model($wheels, array('route' => array('wheels.update', $wheel->id), 'method' => 'PUT')) }}

      <div class="form-group">
        {{ Form::label('bike_id', 'Für Fahrrad') }}
        {{ Form::select('bike_id', $bikes_array, Input::old('bike_id'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('AAP805', 'Artikelbezeichnung') }}
        {{ Form::text('AAP805', Input::old('AAP805'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('AAO677', 'Hersteller') }}
        {{ Form::select('AAO677', array('0' => 'Hersteller wählen', 'KTM' => 'KTM', 'Giant' => 'Giant', 'Diamant' => 'Diamant', 'Cube' => 'Cube'), Input::old('AAO677'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('AAO676', 'Herstellerartikelnummer') }}
        {{ Form::text('AAO676', Input::old('AAO676'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('AAO735', 'Lieferantenname') }}
        {{ Form::text('AAO735', Input::old('AAO735'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('AAO736', 'Lieferantenartikelnummer') }}
        {{ Form::text('AAO736', Input::old('AAO736'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('verweis', 'Verweis') }}
        {{ Form::select('verweis', $wheels_array, Input::old('verweis'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('AAO663', 'GTIN') }}
        {{ Form::text('AAO663', Input::old('AAO663'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('AAD931', 'TARIC') }}
        {{ Form::text('AAD931', Input::old('AAD931'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Editieren', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
  </div>
@stop
