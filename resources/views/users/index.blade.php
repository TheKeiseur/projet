@extends('layout')

@section('title', 'Utilisateurs')

@section('content')

    <h1>Liste des utilisateurs</h1>
    
    <form id="search-user" class="form-inline mb-3">
    <label for="search" class="sr-only">Filtrer</label>
    <input type="search" id="search" name="search" class="form-control" placeholder="Nom utilisateur">
    </form>

    <table id="user-list" class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection