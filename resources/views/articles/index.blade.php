@extends ('layout.app')

@section('title')
  {{count($articles)}} Articles
  @endSection

@section('content')
  <div class="content">

    <div class="title">

      <h4><a href="{{url('articles/create')}}" class="alert alert-info noDeco">Ajouter un article</a></h4>

      @if(count($articles))
        <h1>Tous les Articles</h1>

        @foreach ($articles as $article)

          <article>

            <div>

              <h1>
                <b><a href="{{ url('articles', $article->id )}}">{{ $article->title }}</a></b>
                <span class="links petit"> <a href="{{ url('articles/'. $article->id.'/edit' )}}">Éditer</a>
</span>
              </h1>

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
 