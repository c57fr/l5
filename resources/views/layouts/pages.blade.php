<!DOCTYPE html>
<html lang="fr">
{{--{{Debugbar::disable()}}--}}
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="Site Étude Laravel">
  <meta name="author" content="C57">
  <link rel="icon" href="{{url('/favicon.ico')}}">

  <title>@yield('title') | L5</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700" type="text/css">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/articles.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/my.min.css') }}">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]-->
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!--[endif]-->
</head>

<body>

@include('partials.nav')

<div class="container">
  <div class="blog-header jumbotron">
    <h2 class="blog-title">@yield('title')</h2>
    <p class="lead blog-description">Rubrique Articles.</p>
  </div>

  <div class="row">

    <div class="content">
      <div class="col-sm-12 blog-main">
        @yield('content')
      </div>
    </div>

    {{--<div class="col-sm-3 col-sm-offset-1 blog-sidebar">--}}
    {{--@include('partials.sidebar')--}}
    {{--</div>--}}

  </div><!-- /.row -->

</div><!-- /.container -->

@include('partials.footer')


@include('partials.analytic')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <!-- Bootstrap core JavaScript ========================================== -->
<!-- Placé en fin de document permet un chargement plus rapide de la page -->

</body>
</html>




