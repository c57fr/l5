@extends ('layout.app')

@section('title')
    About
    @endSection

@section('content')
    <div class="content">

        <div class="title">

            <h1>About Me: {{$me->first}} {{$me->last}}</h1>

            @if (count($friends)>1)

                <h3>
                    Friends:

                    @foreach ($friends as $friend)

                        <li>{{ $friend }}</li>

                    @endforeach

                </h3>
            @endif
            <p class='justify'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

    </div>
    </div>

@endsection        
 