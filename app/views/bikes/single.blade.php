<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product</title>
  <?=HTML::style('css/product.css')?>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('api/v1/bikes') }}">REST</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('api/v1/bikes') }}">Alle Bikes</a></li>
        <li><a href="{{ URL::to('api/v1/bikes/create') }}">Bike anlegen</a></li>
        <li><a href="{{ URL::to('api/v1/wheels') }}">Alle Wheels</a></li>
        <li><a href="{{ URL::to('api/v1/wheels/create') }}">Wheel anlegen</a></li>
      </ul>
    </nav>

    <h1>Einzelnes Bike</h1>

    {{ HTML::ul($errors->all()) }}

    <h3>JSON Response <span class="method">GET</span></h3>

    <div class="code">
      <p>{{ $data }}</p>
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
        <?php $products = json_decode($data); ?>
        @foreach($products as $key => $p)
          <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->artikelbezeichnung }}</td>
            <td>{{ $p->produkttyp }}</td>
            <td>{{ $p->hersteller }}</td>
            <td>
              <a class="btn btn-small btn-success" href="{{ URL::to('api/v1/products/' . $p->id) }}">Show</a>
              <a class="btn btn-small btn-info" href="{{ URL::to('api/v1/products/' . $p->id) . '/edit' }}">Edit</a>
              <a class="btn btn-small btn-danger" href="#">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>
</html>
