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
     <h2>Commentaires</h2>
        
        <form action="{{ route('posts.comments', ['id' => $post->id]) }}" method="post" class="mb-2">
            <fieldset>
                <legend>Ajouter un commentaire</legend>
                @csrf
                
                <div class="form-group">
                    <label for="content">Contenu</label>
                    @if($errors->has('content'))
                        <textarea name="content" id="content" cols="30" rows="5" class="form-control is-invalid">{{ old('content') }}</textarea>
                        <div class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </div>
                    @else
                        <textarea name="content" id="content" cols="30" rows="5" class="form-control">{{ old('content') }}</textarea>
                    @endif
                </div>
                <button class="btn btn-primary">Ajouter</button>
            </fieldset>
        </form>
    
@endsection 


