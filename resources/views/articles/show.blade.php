@extends ('layout.app')

@section('title')
Article {{ $article->id }}
@endSection

@section('content')
            <div class="content">

                <p><a href="{{ url ('articles') }}">Retour à la liste</a></p>

                <div class="title">
                    
                    <h1>{{ $article->title }}</h1>

                    <p class="body">{{ $article->body }}</p>

                </div>

            </div>
        </div>

@endsection        
 