<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'unknown')</title>

  <!-- Bootstrap v3.4 css File -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <!-- Fontawesome v4.7 Library Icon css -->
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <!-- My Custom css File -->
  <link rel="stylesheet" href="{{ asset('assets/css/master_admin.css') }}">

  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{-- <script>
      window.onload = function () { // Wait The Window To Load
        window.location = 'logout';
      };
    </script> --}}
</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="{{ route('users.index') }}">Admins <span class="sr-only">(current)</span></a></li>
            <li><a href="{{ route('taxis.index') }}">Taxis</a></li>
          <li><a href="{{ route('cities.index') }}">Cities</a></li>
          {{-- <li><a href="#">Comments</a></li> --}}
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false">Qusay.DR<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('index') }}">Visit Website</a></li>
              <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')


  <!-- jQuery file -->
  <script src="{{ asset('assets/js/jquery.js') }}"></script>
  <!-- Bootstrap v3.4 js file -->
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <!-- My Custom js file -->
  <script src="{{ asset('assets/js/myjs_admin.js') }}"></script>
</body>

</html>
