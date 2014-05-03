@extends('layout.main')

@section('title')
  <title>Einzelnes Bike</title>
@stop

@section('headline')
  <h1>{{ $response[0]->artikelbezeichnung }}</h1>
@stop

@section('content')
  <h3>JSON Response <span class="method">GET</span></h3>

  <div class="code">
    <p>{{ $response }}</p>
  </div>

  <h3>JSON Response visualisiert</h3>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Artikelbezeichnung</th>
        <th>Produkttyp</th>
        <th>Hersteller</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($response as $bikes)
        <tr>
          <td>{{ $bikes->id }}</td>
          <td>{{ $bikes->artikelbezeichnung }}</td>
          <td>{{ $bikes->produkttyp }}</td>
          <td>{{ $bikes->hersteller }}</td>
          <td>
            <a class="btn btn-small btn-info" href="{{ URL::to('bikes/' . $bikes->id) . '/edit' }}">Edit</a>
            <a class="btn btn-small btn-danger" href="#">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@stop