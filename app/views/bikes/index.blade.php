@extends('layout.main')

@section('title')
  <title>Alle Bikes</title>
@stop

@section('headline')
  <h1>Alle Bikes</h1>
@stop

@section('content')
  <h3>JSON Response <span class="method">GET</span></h3>

    <pre>
      <code>{{ $response }}</code>
    </pre>

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
          <th>TARIC (Zolltarifnr.)</th>
          <th>Verweis</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($response as $bikes)
            
          <?php
            $verweis_item = null;

            // Loop through response array (all the bikes) and find the bike that matches the current verweis_id
            foreach($response as $bike) {
              if ($bikes->verweis->verweis_id == $bike->id) {
                $verweis_item = $bike;
                break;
              }
            }
          ?>

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
            <td><a href="{{ $bikes->verweis->href }}">{{ $verweis_item->artikelbezeichnung }}</a></td>
            <td>
              <a class="btn btn-small btn-success" href="{{ URL::to('bikes/' . $bikes->id) }}">Show</a>
              <a class="btn btn-small btn-info" href="{{ URL::to('bikes/' . $bikes->id) . '/edit' }}">Edit</a>
              {{ Form::open(array('url' => 'bikes/' . $bikes->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
              {{ Form::close() }}
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