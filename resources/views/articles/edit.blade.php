@extends ('layout.app')


@section('title')
  Edition {{ $article->id }}
  @endSection


@section('content')
  <div class="content">

    <p><a href="{{ url ('articles') }}">Retour à la liste</a></p>

    <div class="title">

      <h1>Edition : {{ $article->title }}</h1>

      <p>{{$article->published_at}}</p>

      {!! Form::model($article, ['method' => 'PATCH', 'action'=>['ArticlesController@update', $article->id]]) !!}

      <div class="form-group">
        {!! form::label('title', 'Title: ', ['class' => 'control-label']) !!}
        {!! form::text('title', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! form::label('body', 'Body: ', ['class' => 'control-label']) !!}
        {!! form::textarea('body', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! form::label('published_at', 'Publish On: ', ['class' => 'control-label']) !!}
        {!! form::date('published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! form::submit('Update Article', ['class' => 'btn btn-primary form-control']) !!}
      </div>


      {!! Form::close() !!}

    </div>

  </div>
  </div>

@endsection
