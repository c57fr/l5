{!! Form::hidden('user_id','1') !!}

<div class=" form-group">
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
  {!! form::submit($submitButtonText.'Article', ['class' => 'btn btn-primary form-control']) !!}
</div>
