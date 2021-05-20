@extends('layout')

@section('title', 'Page de profil')

@section('content')
    <article>
        <h1>Bonjour {{ $user->name }}</h1>
            
        <h3>Vos informations</h3>
        <ul class="list-group">
            <li class="list-group-item">Votre nom: {{ $user->name }}</li>
            <li class="list-group-item">Votre adresse mail: {{ $user->email }}</li>
            <li class="list-group-item">Votre date d'inscription: {{ $user->created_at->format('d/m/Y H:i') }}</li>
        </ul>
        <a class="btn btn-primary" href="{{ route('users.edit') }}" role="button">Changer mes informations</a>
    </article>
    
    <section>
        <h3>Vos 10 dernières questions</h3>
        @include('partials.posts.index', ['posts' => $posts])
    </section>
    <section>
        <h3>Vos 10 dernières réponses</h3>
        @include('partials.comments.index', ['comments' => $comments])
    </section>
@endsection