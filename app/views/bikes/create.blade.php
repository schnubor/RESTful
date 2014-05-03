@extends('layout.main')

@section('title')
  <title>Bike anlegen</title>
@stop

@section('headline')
  <h1>Bike anlegen</h1>
@stop

@section('content')
  <div class="form-wrapper">
    {{ Form::open(array('url' => 'api/v1/bikes')) }}

      <div class="form-group">
        {{ Form::label('artikelbezeichnung', 'Artikelbezeichnung') }}
        {{ Form::text('artikelbezeichnung', Input::old('artikelbezeichnung'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('hersteller', 'Hersteller') }}
        {{ Form::select('hersteller', array('0' => 'Hersteller wählen', 'KTM' => 'KTM', 'Giant' => 'Giant', 'Diamant' => 'Diamant', 'Cube' => 'Cube'), Input::old('category'), array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
      </div>

      {{ Form::submit('Anlegen', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
  </div>
@stop
