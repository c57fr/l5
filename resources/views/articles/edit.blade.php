@extends ('layouts.articles')


@section('title')
  Édition de l'article n°{{ $article->id }}
  @endSection


@section('content')

  <h5 class="alert alert-info noDeco"><a href="{{ url ('articles') }}"><span class="glyphicon glyphicon-th-list"></span>&nbsp;Retour
      à la liste</a></h5>

  <div class="title">

    <h1>Edition : {{ $article->title }}</h1>

    <p>Publié le <strong>{{ $article->published_at->formatLocalized('%e/%m/%Y') }}</strong> par
      <strong>{{ $article->user->username }}</strong></p>

    @include('partials.errors.list')


    {{ Debugbar::addMessage($article, date('Y-m-d H:i:s')) }}
    {{ debug($errors) }}


    {!! Form::model($article, ['method' => 'PATCH', 'action'=>['ArticlesController@update', $article->id]]) !!}

    @include('articles.form', ['submitButtonText'=>'Enregistrer l\''])

    {!! Form::close() !!}

  </div>

@endsection
