@extends('layout')

@section('title', 'Accueil')

@section('content')
    <h1>Page d'accueil du site</h1>
    
    <article>
        <p>Poser une question</p>
        <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Créer</a>
    </article>
    
    <section>
        <h2>Les 5 derniers articles</h2>
        
        @foreach($posts as $post)
            <article>
                <header>
                    <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h3>
                    <small>Question posée par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y H:i') }}</small>
                </header>
                <p>{!! Str::limit(nl2br(e($post->content)), 150, '(...)') !!}</p>
                <a class="btn btn-primary" href="{{ route('posts.show', ['id' => $post->id]) }}" role="button">Voir la question</a>
            </article>
        @endforeach
    </section>
@endsection