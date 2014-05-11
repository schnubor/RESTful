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
  <div id="jsontree"></div>

  <h3>Beispielhafte Darstellung als Tabelle</h3>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Artikelbezeichnung</th>
        <th>Produkttyp</th>
        <th>Hersteller</th>
        <th>Hanr.</th>
        <th>Lieferant</th>
        <th>Lanr.</th>
        <th>GTIN</th>
        <th>TARIC</th>
        <th>Verweis</th>
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
          <td>{{ $bikes->herstellerartikelnummer }}</td>
          <td>{{ $bikes->lieferantenname }}</td>
          <td>{{ $bikes->lieferantenartikelnummer }}</td>
          <td>{{ $bikes->gtin }}</td>
          <td>{{ $bikes->taric }}</td>
          <td><a href="{{ $bikes->verweis->href }}">{{ $allBikes[$bikes->verweis->verweis_id-1]->artikelbezeichnung }}</a></td>
          <td>
            <a class="btn btn-small btn-info" href="{{ URL::to('bikes/' . $bikes->id) . '/edit' }}">Edit</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@stop

@section('scripts')
  <script>
    $('#jsontree').jsontree('{{ $response }}');
  </script>
@stop