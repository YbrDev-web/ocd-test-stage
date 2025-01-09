@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier une personne</h2>
    <form action="{{ route('people.update', $person->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Méthode PUT pour la mise à jour -->

        <div class="mb-3">
            <label for="first_name" class="form-label">Prénom :</label>
            <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', $person->first_name) }}" required>
            @error('first_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Nom :</label>
            <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $person->last_name) }}" required>
            @error('last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="birth_name" class="form-label">birth_name :</label>
            <input type="text" id="birth_name" name="birth_name" class="form-control" value="{{ old('birth_name', $person->birth_name) }}" required>
            @error('birth_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">middle_names :</label>
            <input type="text" id="middle_names" name="middle_names" class="form-control" value="{{ old('middle_names', $person->middle_names) }}" required>
            @error('middle_names')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">date_of_birth :</label>
            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $person->date_of_birth) }}" required>
            @error('date_of_birth')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('people.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
