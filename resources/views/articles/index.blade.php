@extends ('layouts.articles')

@section('title')
  {{count($articles)}} Articles
  @endSection

@section('content')

  <div class="blog-post" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <div class="title">

      <h5 class="alert alert-info noDeco"><a href="{{url('articles/create')}}">Ajouter un article</a></h5>

      @if(count($articles))
        Effacer
        <h1>Tous les Articles<span class="mini"><a href="{{url('articles/reset')}}">(Les ré-initialiser
              tous)</a></span></h1>

        @foreach ($articles as $article)

          <article>

            <div>

              <h1>
                <b><a href="{{ url('articles', $article->id )}}">{{ $article->title }}</a></b>
                <span class="links petit">

                  <a href="{{ url('articles/'. $article->id.'/edit' )}}">
                    <button class="btn btn-primary">Éditer</button>
                  </a>

                  <a href="#">
                    <button class="btn btn-danger">Effacer</button>
                  </a>

                </span>

              </h1>
              {{--TODOLI Fctn Effacer à rendre opérationnelle--}}
              <div class="body">

                {{ $article->slug }} le
                <b>{{ $article->published_at->formatLocalized('%A %e %B %Y') }}</b> <em>( {{ $article->delai }}
                  )</em><br/><br/>

                {{ $article->body }}


              </div>

            </div>

          </article>

        @endforeach
      @endif

      @if(count($articles)>3) {{-->5--}}

      <nav>
        <ul class="pager">
          <li><a href="#">Précédent</a></li>
          <li><a href="#">Suivant</a></li>
        </ul>
      </nav>
      {{--TODOLI faire fontionner la pagination--}}

      @endif

    </div>
  </div><!-- /.blog-post -->

@endsection
 