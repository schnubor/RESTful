<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  @yield('title')
  <?=HTML::style('css/main.css')?>
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

    @yield('headline')

    {{ HTML::ul($errors->all()) }}
  
    @yield('content')

  </div>

</body>
</html>
