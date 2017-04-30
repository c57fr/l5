@if ($errors->any())

  <ul class="alert alert-danger noDeco">
    @foreach($errors->all() as $error)
      <li><h3>{{$error}}</h3></li>
    @endforeach
  </ul>

@endif