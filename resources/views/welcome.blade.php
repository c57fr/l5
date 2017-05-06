<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>L5</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <style>
    html, body {
      background-color: cornsilk;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
      height: 50vh;
      margin: 0;
    }

    .full-height {
      height: 70vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: -10px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links > a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }
  </style>
  <link rel="stylesheet" href="{{ asset('css/my.css') }}">
</head>
<body>

<h1 class="flex-center position-ref links">
  <a href="/">Home</a> | <a href="articles">Articles</a> | <a href="contact">Contact</a> | <a href="about">About</a>
</h1>

<div class="flex-center position-ref">
  @if (Route::has('login'))
    <div class="top-right links">
      @if (Auth::check())
        <a href="{{ url('/home') }}">Home</a>
      @else
        <a href="{{ url('/login') }}">Login</a>
        <a href="{{ url('/register') }}">Register</a>
      @endif
    </div>
  @endif

  <div class="content">

    <div class="title m-b-md">
      Laravel L5
    </div>

    <div class="links">
      <a href="https://laravel.com/docs">Documentation</a>
      <a href="https://laracasts.com">Laracasts</a>
      <a href="https://laravel-news.com">News</a>
      <a href="https://forge.laravel.com">Forge</a>
      <a href="https://github.com/c57fr/l5" target="_blank">GitHub</a>
    </div>
  </div>
</div>
</body>
</html>
