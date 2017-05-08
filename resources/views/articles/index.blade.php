@extends ('layouts.articles')

@section('title')
  {{count($articles)}} Articles
  @endSection

@section('content')
  <div class="content">
    <div class="blog-post">
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
                  <a href="{{ url('articles/'. $article->id.'/edit' )}}">Éditer</a>
                  <a href="#">Effacer</a>
                  {{--TODOLI Fctn Effacer à rendre opérationnelle--}}
</span>
                </h1>

                <div class="body">

                  {{ $article->slug }} <b>|</b> {{ $article['court_published_at'] }} <em>({{$article->delai}}
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
            <li><a href="#">Précédent <-</a></li>
            <li><a href="#">-> Suivant</a></li>
          </ul>
        </nav>

        @endif

      </div>
    </div><!-- /.blog-post -->
  </div>
@endsection
 