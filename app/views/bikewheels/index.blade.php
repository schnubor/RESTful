@extends('layout.main')

@section('title')
  <title>Wheels von {{ $bike->AAP805 }}</title>
@stop

@section('headline')
  <h1>Wheels von {{ $bike->AAP805 }}</h1>
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
          <th>Für Bike</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($response as $wheels)

          <?php
            $verweis_item = null;

            // Loop through response array (all the wheels) and find the wheel that matches the current verweis_id
            foreach($allWheels as $wheel) {
              if ($wheels->verweis->verweis_id == $wheel->id) {
                $verweis_item = $wheel;
                break;
              }
            }        
          ?>  

          <tr>
            <td>{{ $wheels->id }}</td>
            <td>{{ $wheels->AAP805 }}</td>
            <td>{{ $wheels->AAF542 }}</td>
            <td>{{ $wheels->AAO677 }}</td>
            <td>{{ $wheels->AAO676 }}</td>
            <td>{{ $wheels->AAO735 }}</td>
            <td>{{ $wheels->AAO736 }}</td>
            <td>{{ $wheels->AAO663 }}</td>
            <td>{{ $wheels->AAD931 }}</td>
            <td><a href="{{ $wheels->verweis->href }}">{{ $verweis_item->AAP805 }}</a></td>
            <td><a href="{{ URL::to('bikes/' . $bike->id) }}">{{ $bike->AAP805 }}</a></td>
            <td>
              <a class="btn btn-small btn-success" href="{{ URL::to('wheels/' . $wheels->id) }}">Show</a>
              <a class="btn btn-small btn-info" href="{{ URL::to('wheels/' . $wheels->id) . '/edit' }}">Edit</a>
              {{ Form::open(array('url' => 'wheels/' . $wheels->id, 'class' => 'pull-right')) }}
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