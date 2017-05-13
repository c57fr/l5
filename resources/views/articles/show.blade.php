@extends ('layouts.articles')

@section('title')
  Article {{ $article->id }}
  @endSection

@section('content')

  <h5 class="alert alert-info noDeco"><a href="{{ url ('articles') }}"><span class="glyphicon glyphicon-th-list"></span>
      &nbsp;Retour à la liste</a>
    | <a
        href="{{ url('articles/'. $article->id.'/edit' )}}"><span
          class="glyphicon glyphicon-edit"></span>&nbsp;Éditer</a>
  </h5>


  <div class="title">

    <h2>{{ $article->title }}</h2>
    {{--      <p>{{$article->published_at}}</p>--}}

    <p>Publié le <strong>{{ $article->published_at->formatLocalized('%A %e %B %Y') }}</strong> par
      <strong>{{ $article->user->username }}</strong></p>
    <h3 class="body jumbotron contenu">{{ $article->body }}</h3>

  </div>

@endsection
 