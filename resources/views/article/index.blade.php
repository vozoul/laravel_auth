@extends('layouts.app')

@section('content')

    <h2>Liste d'articles</h2>

    {{-- seul les utilisateurs authentifisés peuvent voir le bouton --}}
    {{--@can('create', App\Article::class)--}}
    @if(Auth::id())
    <div class="clearfix">
        <a href="{{ route('article.create') }}" class="btn btn-primary float-right ">
            Créer
        </a>
    </div>
    @endif
    {{--@endcan--}}
    @foreach($articles as $article)
        <div>
            <h3>{{ $article->title }}</h3>
            <p class="text-muted">Auteur : {{ $article->user->name }}</p>
            <p>
                {{ Str::limit($article->content, 30) }}
                <a href="{{ route('article.show', ['article' => $article]) }}">lire la suite</a>
            </p>
            <hr>
        </div>
    @endforeach

@endsection