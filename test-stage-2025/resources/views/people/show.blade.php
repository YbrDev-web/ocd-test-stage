@extends('layouts.app')

@section('content')
<h1>Informations sur {{ $person->first_name }} {{ $person->last_name }}</h1>

<p><strong>ID :</strong> {{ $person->id }}</p>
<p><strong>Nom de naissance :</strong> {{ $person->birth_name ?? 'Non spécifié' }}</p>
<p><strong>Autres prénoms :</strong> {{ $person->middle_names ?? 'Non spécifié' }}</p>
<p><strong>Date de naissance :</strong> {{ $person->date_of_birth ?? 'Non spécifiée' }}</p>
<p><strong>Créé par :</strong> {{ $person->creator->name ?? 'Inconnu' }}</p>

<h3>Parents :</h3>
<ul>
    @forelse($person->parents as $parent)
        <li>{{ $parent->first_name }} {{ $parent->last_name }}</li>
    @empty
        <li>Aucun parent trouvé.</li>
    @endforelse
</ul>

<h3>Enfants :</h3>
<ul>
    @forelse($person->children as $child)
        <li>{{ $child->first_name }} {{ $child->last_name }}</li>
    @empty
        <li>Aucun enfant trouvé.</li>
    @endforelse
</ul>

<a href="{{ route('people.index') }}">Retour à la liste</a>
@endsection
