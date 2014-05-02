<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Erstellen</title>
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
        <li><a href="{{ URL::to('api/v1/bikes') }}">Alle Bikes</a></li>
        <li><a href="{{ URL::to('api/v1/bikes/create') }}">Bike anlegen</a></li>
        <li><a href="{{ URL::to('api/v1/wheels') }}">Alle Wheels</a></li>
        <li><a href="{{ URL::to('api/v1/wheels/create') }}">Wheel anlegen</a></li>
      </ul>
    </nav>

    <h1>Neues Produkt erstellen</h1>

    {{ HTML::ul($errors->all()) }}
    
    <div class="form-wrapper">
      {{ Form::open(array('url' => 'api/v1/products')) }}

        <div class="form-group">
          {{ Form::label('name', 'Name') }}
          {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::label('category', 'Category') }}
          {{ Form::select('category', array('0' => 'Select a category', 'Haushalt' => 'Haushalt', 'Auto' => 'Auto', 'Beer' => 'Beer'), Input::old('category'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
          {{ Form::label('price', 'Price') }}
          {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Create Product', array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
    
  </div>

</body>
</html>
