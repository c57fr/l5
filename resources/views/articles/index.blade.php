@extends ('layouts.articles')

@section('title')
  {{count($articles)}} Article{{count($articles)>1?'s':''}}
  @endSection

@section('content')

  <div class="blog-post">

    <h5 class="alert alert-info noDeco"><a href="{{url('articles/create')}}"><span
            class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter un article</a></h5>

    @if(count($articles))
      Effacer
      <div class="title">
        <h1>Tous les Articles

          {{--todoli Faire fonctionner reset--}}
          {{--<span class="mini">--}}
          {{--<a href="{{url('articles/reset')}}">(Les ré-initialiser--}}
          {{--tous)</a>--}}
          {{--</span>--}}

        </h1>

        @foreach ($articles as $article)

          {{--Factorisation du template d'un article peut-être possible quand listing peut être de la même structure qu'un show--}}
          {{--@include('articles.article');--}}

          @include('articles.article')

          <br/>

        @endforeach
        @endif

        @if(count($articles)>1) {{-->5--}}

        <nav>
          <ul class="blog-pagination pager">
            <li class="btn btn-outline-primary"><a href="#">Précédent</a></li>
            <li class="btn btn-outline-secondary disable"><a href="#">Suivant</a></li>
          </ul>
        </nav>
        {{--TODOLI faire fontionner la pagination--}}

        @endif

      </div>
  </div><!-- /.blog-post -->
@endsection
 