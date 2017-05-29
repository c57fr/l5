@extends ('layouts.articles')

@section('title')
  Article {{ $article->id }}
  @endSection

@section('content')

  <h5 class="alert alert-info noDeco"><a href="{{ url ('articles') }}"><span class="glyphicon glyphicon-th-list"></span>
      &nbsp;Retour à la liste</a>
  </h5>

  @include('articles.article')

  <hr>

  @include('partials.errors.list')

  <div class="comments">
    <ul class="list-group">
      @foreach($article->comments as $comment)
        <li class="list-group-item">
          <strong>
            {{ ucfirst($comment->created_at->diffForHumans()) }} par {{$comment->user->username}}:<br/>
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
        <div class="form-group">
            <textarea name="body" placeholder="Votre commentaire ici" cols="30" rows="10"
                      class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ajouter votre commentaire</button>
        </div>
      </form>
    </div>
  </div>

@endsection
 