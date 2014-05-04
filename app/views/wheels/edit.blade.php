@extends('layout.main')

@section('title')
  <title>Wheel editieren</title>
@stop

@section('headline')
  <h1>Wheel editieren</h1>
@stop

@section('content')
  <div class="form-wrapper">
    {{ Form::model($wheel, array('route' => array('wheels.update', $wheel->id), 'method' => 'PUT')) }}

      <div class="form-group">
        {{ Form::label('bike_id', 'Für Fahrrad') }}
        {{ Form::text('bike_id', Input::old('bike_id'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('artikelbezeichnung', 'Artikelbezeichnung') }}
        {{ Form::text('artikelbezeichnung', Input::old('artikelbezeichnung'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('hersteller', 'Hersteller') }}
        {{ Form::select('hersteller', array('0' => 'Hersteller wählen', 'KTM' => 'KTM', 'Giant' => 'Giant', 'Diamant' => 'Diamant', 'Cube' => 'Cube'), Input::old('category'), array('class' => 'form-control')) }}
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
        {{ Form::text('verweis', Input::old('verweis'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('gtin', 'GTIN') }}
        {{ Form::text('gtin', Input::old('gtin'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('taric', 'TARIC') }}
        {{ Form::text('taric', Input::old('taric'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Editieren', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
  </div>
@stop