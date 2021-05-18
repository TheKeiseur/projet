@extends('layout')

@section('title', $post->title)

@section('content')
    <article>
        <header class="mb-3">
            <h1>{{ $post->title }}</h1>
            
            <small>
                Rédigé par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y H:i') }}
            </small>
        </header> 
        {!! nl2br(e($post->content)) !!}
    </article>
    
@endsection 


