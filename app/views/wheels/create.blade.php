@extends('layout.main')

@section('title')
  <title>Wheel anlegen</title>
@stop

@section('headline')
  <h1>Wheel anlegen <span class="method">POST</span></h1>
@stop

<?php
  $bikes_array = array(); 
  $wheels_array = array();
?>

@foreach($bikes as $bike)
  <?php $bikes_array[$bike->id] = $bike->artikelbezeichnung; ?>
@endforeach

@foreach($wheels as $wheel)
  <?php $wheels_array[$wheel->id] = $wheel->artikelbezeichnung; ?>
@endforeach

@section('content')
  <div class="form-wrapper">
    {{ Form::open(array('url' => 'wheels')) }}

      <div class="form-group">
        {{ Form::label('bike_id', 'Für Fahrrad') }}
        {{ Form::select('bike_id', $bikes_array, Input::old('bike_id'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('artikelbezeichnung', 'Artikelbezeichnung') }}
        {{ Form::text('artikelbezeichnung', Input::old('artikelbezeichnung'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('hersteller', 'Hersteller') }}
        {{ Form::select('hersteller', array('0' => 'Hersteller wählen', 'KTM' => 'KTM', 'Giant' => 'Giant', 'Diamant' => 'Diamant', 'Cube' => 'Cube'), Input::old('hersteller '), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('herstellerartikelnummer', 'Herstellerartikelnummer') }}
        {{ Form::text('herstellerartikelnummer', Input::old('herstellerartikelnummer'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('lieferantenname', 'Lieferantenname') }}
        {{ Form::text('lieferantenname', Input::old('lieferantenname'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('lieferantenartikelnummer', 'Lieferantenartikelnummer') }}
        {{ Form::text('lieferantenartikelnummer', Input::old('lieferantenartikelnummer'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('verweis', 'Verweis') }}
        {{ Form::select('verweis', $wheels_array, Input::old('verweis'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('gtin', 'GTIN') }}
        {{ Form::text('gtin', Input::old('gtin'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('taric', 'TARIC') }}
        {{ Form::text('taric', Input::old('taric'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Anlegen', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
  </div>
@stop
