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
        @include('partials.posts.index', ['posts' => $posts])
    </section>
@endsection