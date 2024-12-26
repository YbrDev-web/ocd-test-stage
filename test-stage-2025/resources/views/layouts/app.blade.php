<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Test technique OCD')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('people.index') }}">Test technique OCD</a>
                <div>
                    <a href="{{ route('people.index') }}" class="btn btn-outline-primary">Liste des personnes</a>
                    <a href="{{ route('people.create') }}" class="btn btn-outline-success">Créer une personne</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mt-4">
        @yield('content')
    </main>
    <footer class="text-center mt-4">
        <p>&copy; {{ date('Y') }} - Test technique OCD</p>
    </footer>
</body>
</html>

