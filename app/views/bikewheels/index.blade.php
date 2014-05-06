@extends('layout.main')

@section('title')
  <title>Wheels von {{ $bike->artikelbezeichnung }}</title>
@stop

@section('headline')
  <h1>Wheels von {{ $bike->artikelbezeichnung }}</h1>
@stop

@section('content')
  <h3>JSON Response <span class="method">GET</span></h3>

    <div class="code">
      <p>{{ $wheels }}</p>
    </div>

    <h3>JSON Response visualisiert</h3>
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
          <th>Bike</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($wheels as $wheels)
          <tr>
            <td>{{ $wheels->id }}</td>
            <td>{{ $wheels->artikelbezeichnung }}</td>
            <td>{{ $wheels->produkttyp }}</td>
            <td>{{ $wheels->hersteller }}</td>
            <td>{{ $wheels->herstellerartikelnummer }}</td>
            <td>{{ $wheels->lieferantenname }}</td>
            <td>{{ $wheels->lieferantenartikelnummer }}</td>
            <td>{{ $wheels->gtin }}</td>
            <td>{{ $wheels->taric }}</td>
            <td><a href="{{ URL::to('wheels/' . $wheels->verweis) }}">{{ $wheels->verweis }}</a></td>
            <td><a href="{{ URL::to('bikes/' . $bike->id) }}">{{ $bike->artikelbezeichnung }}</a></td>
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