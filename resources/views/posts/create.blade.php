@extends('layout')

@section('title', 'Création d\'un nouvel article')

@section('content')
    <h1>Création d'une nouvelle question</h1>
    
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        @if($errors->any())
            <aside class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </aside>
        @endif
        
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="categories">Catégories</label>
            <select multiple class="form-control" name="categories[]" id="categories">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Enregistrer</button>
    </form>
@endsection