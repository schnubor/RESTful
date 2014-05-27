<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  @yield('title')
  {{ HTML::style('css/main.css') }}
  {{ HTML::style('css/jsontree.css') }}
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  {{ HTML::script('js/jsontree.js') }}
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('/') }}">HOME</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('bikes') }}">Alle Bikes</a></li>
        <li><a href="{{ URL::to('bikes/create') }}">Bike anlegen</a></li>
        <li><a href="{{ URL::to('wheels') }}">Alle Wheels</a></li>
        <li><a href="{{ URL::to('wheels/create') }}">Wheel anlegen</a></li>
        <li><a href="{{ URL::to('bikes/1/wheels') }}">Mountainbike wheels</a></li>
      </ul>
    </nav>

    @yield('headline')

    {{ HTML::ul($errors->all()) }}
  
    @yield('content')

  </div>

  <footer>
    <p class="info">Christian Korndörfer | CMM2012 | <a href="http://www.chko.org">chko.org</a> | <a href="https://twitter.com/schnubor">#schnubor</a></p>
  </footer>

  @yield('scripts')

</body>
</html>
