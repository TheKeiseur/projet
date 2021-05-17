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
                <h3>{{ $post->title }}</h3>
            </header>
        </article>


@endsection