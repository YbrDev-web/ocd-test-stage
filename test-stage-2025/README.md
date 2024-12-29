# Test Technique OCD - Gestion des Membres de la Famille

## Description

Cette application Laravel permet de gérer une base de données de personnes et de relations familiales. Elle inclut les fonctionnalités suivantes :

- Création, consultation et affichage des membres de la famille.
- Ajout de relations familiales (parent-enfant).
- Détermination du degré de parenté entre deux personnes.

---

## Installation

1. **Cloner le dépôt :**
   ```bash
   git clone <url-du-depot>
   cd <nom-du-projet>
Installer les dépendances :

bash
Copier le code
composer install
npm install
npm run dev
Configurer l'environnement :

Copier le fichier .env.example en .env :
bash
Copier le code
cp .env.example .env
Configurer la base de données dans le fichier .env :
makefile
Copier le code
DB_DATABASE=nom_de_la_base
DB_USERNAME=nom_utilisateur
DB_PASSWORD=mot_de_passe
Générer la clé de l'application :

bash
Copier le code
php artisan key:generate
Lancer les migrations et les seeders :

bash
Copier le code
php artisan migrate
Lancer le serveur local :

bash
Copier le code
php artisan serve
Fonctionnalités Implémentées
1. Base de Données
Deux tables principales ont été créées : people et relationships.
Table people
Colonnes :
id (bigint, clé primaire)
created_by (bigint, utilisateur créateur)
first_name, last_name, birth_name, middle_names (informations personnelles)
date_of_birth (date de naissance)
timestamps
Table relationships
Colonnes :
id (bigint, clé primaire)
created_by (bigint, utilisateur créateur)
parent_id, child_id (relations parent-enfant)
timestamps
Index
Les colonnes created_by, parent_id, et child_id sont indexées pour optimiser les requêtes.
2. Modèles Eloquent
Des modèles ont été créés pour chaque table, avec les relations suivantes :

Une personne peut avoir plusieurs parents et plusieurs enfants (belongsToMany).
Une personne est associée à un utilisateur créateur (belongsTo).
3. Contrôleur PersonController
Le PersonController gère les actions suivantes :

index : Liste toutes les personnes avec leurs créateurs.
show : Affiche une personne spécifique avec ses parents et ses enfants.
create : Affiche le formulaire pour créer une nouvelle personne.
store : Valide les données et enregistre une nouvelle personne.
testDegree : Détermine le degré de parenté entre deux personnes.
4. Routes
Les routes suivantes ont été définies dans web.php :

php
Copier le code
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RelationshipController;

// Routes pour les personnes
Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
Route::post('/people', [PersonController::class, 'store'])->name('people.store');
Route::get('/people/{id}', [PersonController::class, 'show'])->name('people.show');

// Test de parenté
Route::get('/people/test-degree', [PersonController::class, 'testDegree']);

// Routes pour les relations familiales
Route::get('/relationships/create', [RelationshipController::class, 'createRelationship'])->name('relationships.create');
Route::post('/relationships', [RelationshipController::class, 'storeRelationship'])->name('relationships.store');
5. Vues
Layout Général
Le layout principal (resources/views/layouts/app.blade.php) contient le design commun.

Vues Disponibles
index.blade.php : Affiche la liste des personnes.
show.blade.php : Affiche les détails d'une personne et ses relations familiales.
create.blade.php : Formulaire de création de nouvelles personnes.
relationships/create.blade.php : Formulaire pour ajouter une relation parent-enfant.
6. Méthode pour Calculer le Degré de Parenté
La méthode getDegreeWith($target_person_id) a été ajoutée au modèle Person pour déterminer le degré de parenté entre deux personnes.

Exemple d'Utilisation
php
Copier le code
DB::enableQueryLog();
$timestart = microtime(true);

$person = App\Models\Person::findOrFail(84);
$degree = $person->getDegreeWith(1265);

var_dump([
    "degree" => $degree,
    "time" => microtime(true) - $timestart,
    "nb_queries" => count(DB::getQueryLog()),
]);
Tests et Debugging
Activer le Log des Requêtes SQL :

php
Copier le code
DB::enableQueryLog();
Afficher les Logs SQL :

php
Copier le code
dd(DB::getQueryLog());
Suivi du Temps d'Exécution : Ajoutez un suivi du temps dans vos scripts pour évaluer les performances.

Auteur
Ce projet a été réalisé dans le cadre d'un test technique OCD. Toutes les fonctionnalités respectent les exigences demandées.

Copier le code





