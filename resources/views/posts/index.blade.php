@extends('layout')

@section('title', 'Questions')

@section('content')

    <h1>Toutes les questions</h1>
    
    <nav>
        {{ $posts->links() }}
    </nav>
    
    @foreach($posts as $post)
        <article>
            <header>
                <h3><a href="#">{{ $post->title }}</a></h3>
                <small>Question posée par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y H:i') }}</small>
            </header>
            {!! nl2br(e($post->content)) !!}
        </article>
@endsection