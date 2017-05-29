<article>

  <h1>
    <b><a href="{{ url('articles', $article->id )}}">{{ $article->title }}</a></b>
          <span class="links petit">

          <a href="{{ url('articles/'. $article->id.'/edit' )}}">
            <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></button>
          </a>

          <a href="#">
            <button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
          </a>
          <span class="petit">par {{ $article->username }}</span>
          </span>

  </h1>
  {{--TODOLI Fctn Effacer à rendre opérationnelle--}}

  {{ $article->slug }} le
  <b>{{ $article->created_at->formatLocalized('%A %e %B %Y') }}</b> <em>( {{ $article->delai }}
    )</em><br/><br/>

  <div class="jumbotron contenu">{{ $article->body }}</div>

</article>