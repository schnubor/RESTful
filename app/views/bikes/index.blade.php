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
          <th>TARIC</th>
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
            <td>{{ $bikes->AAP805 }}</td>
            <td>{{ $bikes->AAF542 }}</td>
            <td>{{ $bikes->AAO677 }}</td>
            <td>{{ $bikes->AAO676 }}</td>
            <td>{{ $bikes->AAO735 }}</td>
            <td>{{ $bikes->AAO736 }}</td>
            <td>{{ $bikes->AAO663 }}</td>
            <td>{{ $bikes->AAD931 }}</td>
            <td><a href="{{ $bikes->verweis->href }}">{{ $verweis_item->AAP805 }}</a></td>
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