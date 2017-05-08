@extends ('layouts.articles')


@section('title')
  Édition de l'article n°{{ $article->id }}
  @endSection


@section('content')

  <h5 class="alert alert-info noDeco"><a href="{{ url ('articles') }}">Retour à la liste</a></h5>

  <div class="title">

    <h1>Edition : {{ $article->title }}</h1>

    <p>{{$article->published_at}}</p>


    @include('partials.errors.list')


    {{ Debugbar::addMessage($article, date('Y-m-d H:i:s')) }}
    {{ debug($errors) }}


    {!! Form::model($article, ['method' => 'PATCH', 'action'=>['ArticlesController@update', $article->id]]) !!}

    @include('articles.form', ['submitButtonText'=>'Update'])

    {!! Form::close() !!}

  </div>

@endsection
