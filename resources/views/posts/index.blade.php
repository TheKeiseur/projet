@extends('layout')

@section('title', 'Questions')

@section('content')

    <h1>Toutes les questions</h1>
    
    <nav>
        {{ $posts->links() }}
    </nav>
    
    @include('partials.posts.index', ['posts' => $posts])
    
@endsection