@extends ('layout.app')

@section('title')
  Article {{ $article->id }}
  @endSection

@section('content')
  <div class="content">

    <h5 class="alert alert-info noDeco"><a href="{{ url ('articles') }}">Retour à la liste</a>
      | <a href="{{ url('articles/'. $article->id.'/edit' )}}">Éditer</a>
    </h5>

    <div class="title">

      <h2>{{ $article->title }}</h2>
      <p>{{$article->published_at}}</p>

      <h3 class="body">{{ $article->body }}</h3>

    </div>

  </div>
  </div>

@endsection        
 