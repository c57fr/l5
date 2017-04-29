@extends ('layout.app')

@section('title')
  Articles
  @endSection

@section('content')
  <div class="content">

    <div class="title">

      <a href="{{url('articles/create')}}">Ajouter un article</a>

      @if(count($articles))
        <h1>Tous les Articles</h1>

        @foreach ($articles as $article)

          <article>

            <div>

              <h1><b>
                  <a href="{{ url('articles', $article->id )}}">{{ $article->title }}</a>
                </b></h1>

              <div class="body">

                {{ $article->slug }} - {{ $article->published_at }} <em>({{$article->delai}})</em><br/><br/>

                {{ $article->body }}

              </div>

            </div>

          </article>

        @endforeach
      @endif
    </div>

  </div>
@endsection
 