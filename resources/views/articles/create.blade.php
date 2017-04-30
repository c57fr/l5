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


    @include('partials.errors.list')


    {{ debug($errors) }}

    {!! Form::open(['url' => 'articles']) !!}

    @include('articles.form', ['submitButtonText'=>'Add'])


    {!! Form::close() !!}

  </div>

@endsection
 