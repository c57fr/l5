{!! Form::hidden( 'user_id',Auth::user()->id ) !!}

{{ vd(Auth::user()->id) }}

<div class=" form-group">
  {!! form::label('title', 'Titre :', ['class' => 'control-label']) !!}
  {!! form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! form::label('body', 'Contenu :', ['class' => 'control-label']) !!}
  {!! form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! form::label('published_at', 'Publié le :', ['class' => 'control-label']) !!}
  {!! form::date('published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! form::submit($submitButtonText.'Article', ['class' => 'btn btn-primary form-control']) !!}
</div>
