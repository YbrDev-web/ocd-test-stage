@extends('layouts.app')

@section('title', 'Créer une personne')

@section('content')
<div class="container">
    <h1>Créer une nouvelle personne</h1>

    <!-- Affichage des messages d'erreur -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire de création -->
    <form action="{{ route('people.store') }}" method="POST">
        @csrf

        <!-- Prénom -->
        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
        </div>

        <!-- Nom -->
        <div class="mb-3">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
        </div>

        <!-- Nom de naissance -->
        <div class="mb-3">
            <label for="birth_name" class="form-label">Nom de naissance (optionnel)</label>
            <input type="text" name="birth_name" id="birth_name" class="form-control" value="{{ old('birth_name') }}">
        </div>

        <!-- Autres prénoms -->
        <div class="mb-3">
            <label for="middle_names" class="form-label">Autres prénoms (optionnel)</label>
            <input type="text" name="middle_names" id="middle_names" class="form-control" value="{{ old('middle_names') }}">
        </div>

        <!-- Date de naissance -->
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date de naissance (optionnel)</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
        </div>

        <!-- Créé par -->
        <div class="mb-3">
            <label for="created_by" class="form-label">ID de l'utilisateur créateur</label>
            <input type="number" name="created_by" id="created_by" class="form-control" value="{{ old('created_by') }}" required>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>

@endsection
