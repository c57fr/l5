@extends ('layout.app')

@section('title')
  Article {{ $article->id }}
  @endSection

@section('content')
  <div class="content">

    <p><a href="{{ url ('articles') }}">Retour à la liste</a></p>

    <div class="title">

      <h1>{{ $article->title }}</h1>

      <p>{{$article->published_at}}</p>

      <h3 class="body">{{ $article->body }}</h3>

    </div>

  </div>
  </div>

@endsection        
 