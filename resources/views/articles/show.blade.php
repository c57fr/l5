@extends ('layouts.articles')

@section('title')
  Article {{ $article->id }}
  @endSection

@section('content')

  <h5 class="alert alert-info noDeco"><a href="{{ url ('articles') }}">Retour à la liste</a> | <a
        href="{{ url('articles/'. $article->id.'/edit' )}}">Éditer</a>
  </h5>


  <div class="title">

    <h2>{{ $article->title }}</h2>
    {{--      <p>{{$article->published_at}}</p>--}}

    <p>Publié le {{ $article->published_at->formatLocalized('%A %e %B %Y') }}</p>

    <h3 class="body">{{ $article->body }}</h3>

  </div>

@endsection
 