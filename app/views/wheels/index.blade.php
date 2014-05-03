@extends('layout.main')

@section('title')
  <title>Alle Wheels</title>
@stop

@section('headline')
  <h1>Alle Wheels</h1>
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
      @foreach($response as $wheels)
        <tr>
          <td>{{ $wheels->id }}</td>
          <td>{{ $wheels->artikelbezeichnung }}</td>
          <td>{{ $wheels->produkttyp }}</td>
          <td>{{ $wheels->hersteller }}</td>
          <td>
            <a class="btn btn-small btn-success" href="{{ URL::to('api/v1/wheels/' . $wheels->id) }}">Show</a>
            <a class="btn btn-small btn-info" href="{{ URL::to('api/v1/wheels/' . $wheels->id) . '/edit' }}">Edit</a>
            <a class="btn btn-small btn-danger" href="#">Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@stop
