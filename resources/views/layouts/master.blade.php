<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mototoooo">
    <meta name="author" content="Stichoza">

    <title>Motörhead Tegetarius</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('lib/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet">
    <link href="{{ url('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('lib/bpg-nateli/css/bpg-nateli.min.css') }}" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ url('css/dist/main.min.css') }}" rel="stylesheet">

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="{{ route('employee.index') }}">მთავარი</a></li>
            <li role="presentation"><a href="{{ route('employee.create') }}">თანამშრომლის დამატება</a></li>
            <li role="presentation"><a href="{{ route('statistics') }}">სტატისტიკა</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Motörhead Tegetarius</h3>
      </div>

      @yield('content')

      <footer class="footer">
        <p>&copy; {{ date('Y') }} მე.</p>
      </footer>

    </div> <!-- /container -->


    <!-- JavaScript -->
    @yield('prescripts')
    <script src="{{ url('lib/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('lib/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ url('lib/bootstrap-table/dist/locale/bootstrap-table-ka-GE.min.js') }}"></script>
    @yield('postscripts')
  </body>
</html>

