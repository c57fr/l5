@extends ('layout.app')

@section('title')
  Create Article
  @endSection

@section('content')
  <div class="content">

    <p class="alert alert-info noDeco"><a href="{{ url ('articles') }}">Retour à la liste</a></p>

    <div class="title">
      <h1>Écrire un article</h1>
    </div>


    @if ($errors->any())

      <ul class="alert alert-danger noDeco">
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>

    @endif


    {{ debug($errors) }}

    {!! Form::open(['url' => 'articles']) !!}

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
      {!! form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>


    {!! Form::close() !!}

  </div>

@endsection
 