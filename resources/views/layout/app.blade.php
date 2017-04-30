<!DOCTYPE html>

<html lang="fr">

<head>
  <title>@yield('title') | Laravel</title>
  <meta charset="UTF-8"/>
  <meta name="description" content="Etude Laravel"/>
  <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/my.css') }}">

</head>

<body>

<h1 class="mynav links">
  <a href="/">Accueil</a> | <a href="/articles">Articles</a> | <a href="/contact">Contact</a> | <a
      href="/about">About</a>
</h1>

<hr/>

<div class="container">

  <h1>Page @yield('title')</h1>

  @yield('content')

</div>

@yield('footer')

</body>

</html>