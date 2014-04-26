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
        <a class="navbar-brand" href="{{ URL::to('api/v1/products') }}">REST</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('api/v1/products') }}">Alle Produkte</a></li>
        <li><a href="{{ URL::to('api/v1/products/create') }}">Produkt anlegen</a>
      </ul>
    </nav>

    <h1>Alle Produkte</h1>

    {{ HTML::ul($errors->all()) }}

    <h3>JSON Response</h3>

    <div class="code">
      <p>{{ $data }}</p>
    </div>

    <h3>JSON Response visualisiert</h3>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Category</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php $products = json_decode($data); ?>
        @foreach($products as $key => $p)
          <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category }}</td>
            <td>{{ $p->price }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>
</html>
