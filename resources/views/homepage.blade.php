@extends('layout')

@section('title', 'Accueil')

@section('content')
    <h1>Page d'accueil du site</h1>
    
    <section>
        <h2>Les 5 derniers articles</h2>
        
        @foreach($posts as $post)
            <article>
                <header>
                    <h3><a href="#">{{ $post->title }}</a></h3>
                    <small>Question posée par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y H:i') }}</small>
                </header>
                <p>{!! Str::limit(nl2br(e($post->content)), 150, '(...)') !!}</p>
                <button class="btn btn-primary" href="#">Voir la question</button>
            </article>
        @endforeach
    </section>
@endsection