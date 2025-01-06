<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Inscription</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">nom</label>
                            <input type="name" name="name" id="name" class="form-control" 
                                   value="{{ old('name') }}" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Adresse email</label>
                            <input type="email" name="email" id="email" class="form-control" 
                                   value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="#">soumettre</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>