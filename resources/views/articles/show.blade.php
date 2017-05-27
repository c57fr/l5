@extends ('layouts.articles')

@section('title')
  Article {{ $article->id }}
  @endSection

@section('content')

  <h5 class="alert alert-info noDeco"><a href="{{ url ('articles') }}"><span class="glyphicon glyphicon-th-list"></span>
      &nbsp;Retour à la liste</a>
    | <a
        href="{{ url('articles/'. $article->id.'/edit' )}}"><span
          class="glyphicon glyphicon-edit"></span>&nbsp;Éditer</a>
  </h5>


  <div class="title">

    <h2>{{ $article->title }}</h2>
    {{--      <p>{{$article->published_at}}</p>--}}

    {{--    <p>Publié le <strong>{{ $article->published_at->formatLocalized('%A %e %B %Y') }}</strong> par--}}
    {{--      <strong>{{ $article->user->username }}</strong></p>--}}
    <h3 class="body jumbotron contenu">{{ $article->body }}</h3>

    <hr>


    @include('partials.errors.list')

    <div class="comments">
      <ul class="list-group">
        @foreach($article->comments as $comment)
          <li class="list-group-item">
            <strong>
              {{ $comment->created_at->diffForHumans() }}: &nbsp;
            </strong>
            {{ $comment->body }}
          </li>
        @endforeach
      </ul>
    </div>
    {{--Ajouter un commentaire--}}
    <div class="card">
      <div class="card-block">
        <form method="POST" action="/articles/{{$article->id}}/comments">
          {{csrf_field()}}
          {!! Form::hidden( 'user_id',Auth::user()->id ) !!}
          <div class="form-group">
            <textarea name="body" placeholder="Votre commentaire ici" id="" cols="30" rows="10"
                      class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Ajouter votre commentaire</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
 