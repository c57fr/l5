<article>

  <h1>
    <b>{!! $article->titre !!}</b>
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


  @if(count($article->tags))

    <ul>
      @foreach($article->tags as $tag)
        <a href="/articles/tags/{{$tag->name}}">{{ $tag->name }}</a>
      @endforeach
    </ul>
  @endif

  {{ $article->slug }} le
  <b>{{ $article->created_at->formatLocalized('%A %e %B %Y') }}</b> <em>( {{ $article->delai }}
    )</em><br/><br/>

  <div class="jumbotron contenu">{{ $article->body }}</div>

</article>