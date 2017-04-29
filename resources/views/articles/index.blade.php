@extends ('layout.app')

@section('title')
  Articles
  @endSection

@section('content')
  <div class="content">

    <div class="title">

      <h1>Tous les Articles</h1>

      @foreach ($articles as $article)

        <article>

          <div>

            <h1><b>
                <a href="{{ url('articles', $article->id )}}">{{ $article->title }}</a>
              </b></h1>

            <div class="body">

              {{ $article->slug }}<br/><br/>

              {{ $article->body }}

            </div>

          </div>

        </article>

      @endforeach

    </div>

  </div>
@endsection
 