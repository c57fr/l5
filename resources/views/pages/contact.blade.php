@extends('layout.app')

@section('title')
  Contact
  @endSection

@section('content')
  <div class="container">

    <div class="title">
      <h1>Contact Me !</h1>
      <p class="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
    </div>

    @component('mail::panel')
    This is the panel content.
    @endcomponent

    <h1>
      {{--      <pre>{{ var_dump($testEmail) }}</pre>--}}
    </h1>

  </div>
@endsection

@section('footer')
  <script>console.log('Contact from script');</script>
@stop