@extends('layouts.app')

@section('content')
<h1>Liste des personnes</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Créé par</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($people as $person)
        <tr>
            <td>{{ $person->id }}</td>
            <td>{{ $person->first_name }}</td>
            <td>{{ $person->last_name }}</td>
            <td>{{ $person->creator->name ?? 'Inconnu' }}</td>
            <td>
                <a href="{{ route('people.show', $person->id) }}">Voir</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Aucune personne trouvée.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('people.create') }}">Créer une nouvelle personne</a>
@endsection
