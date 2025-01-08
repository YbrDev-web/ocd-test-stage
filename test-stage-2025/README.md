# Test Technique OCD - Gestion des Membres de la Famille

Ce projet Laravel implémente une application de gestion de membres de famille, permettant la création de profils, la définition de relations familiales, et le calcul de degrés de parenté.

---

## Table des Matières

1. [Prérequis](#prérequis)
2. [Installation](#installation)
3. [Fonctionnalités](#fonctionnalités)
   - [Modèles de Données](#modèles-de-données)
   - [Relations Eloquent](#relations-eloquent)
   - [Contrôleurs](#contrôleurs)
   - [Routes](#routes)
   - [Vues](#vues)
4. [Calcul du Degré de Parenté](#calcul-du-degré-de-parenté)
5. [Tests et Debugging](#tests-et-debugging)
6. [Auteur](#auteur)

---

## Prérequis

- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL ou MariaDB
- Laravel >= 9.x

---

## Installation

1. **Cloner le dépôt :**
   ```bash
   git clone https://github.com/YbrDev-web/ocd-test-stage.git
   cd C:\xampp\Test_Technique_Ocd\ocd-test-stage\test-stage-2025

2. **Installation des dépendances :**

Installer les dépendances :


composer install
npm install
npm run dev
Configurer l'environnement :

3. **Copier le fichier .env.example en .env :**
cp .env.example .env
Configurer la base de données dans le fichier .env :
env


DB_DATABASE=nom_de_la_base
DB_USERNAME=nom_utilisateur
DB_PASSWORD=mot_de_passe
Générer la clé de l'application :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ocd_project
DB_USERNAME=root
DB_PASSWORD=


php artisan key:generate
4. **Exécuter les migrations .**
php artisan migrate

5. **Lancer le serveur local .**


php artisan serve
Fonctionnalités
Modèles de Données
Table people


6. **Gère les profils des personnes.**
Colonnes :
id : Identifiant unique.
created_by : Référence à l'utilisateur créateur.
first_name, last_name, birth_name, middle_names : Informations personnelles.
date_of_birth : Date de naissance.
timestamps : Champs created_at et updated_at.
Table relationships
Gère les relations parent-enfant.
Colonnes :
id : Identifiant unique.
created_by : Référence à l'utilisateur créateur.
parent_id et child_id : Relations parent-enfant.
timestamps : Champs created_at et updated_at.
Relations Eloquent
Les relations définies dans les modèles incluent :

Relations parent-enfant :

Une personne peut avoir plusieurs enfants : hasMany.
Une personne peut avoir plusieurs parents : belongsToMany.
Utilisateur créateur :

Une personne est associée à un utilisateur créateur : belongsTo.
Contrôleurs
PersonController
index : Liste toutes les personnes avec leurs créateurs.
show : Affiche une personne et ses relations (enfants et parents).
create : Affiche un formulaire pour créer une nouvelle personne.
store : Valide les données et enregistre une nouvelle personne.
testDegree : Calcule le degré de parenté entre deux personnes.
RelationshipController
createRelationship : Affiche un formulaire pour ajouter une relation parent-enfant.
storeRelationship : Enregistre une relation parent-enfant.

## Routes
Les routes définies dans le fichier web.php sont les suivantes :

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\LogoutController;

## Routes pour les personnes
Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
Route::post('/people', [PersonController::class, 'store'])->name('people.store');
Route::get('/people/{id}', [PersonController::class, 'show'])->name('people.show');
Route::get('/people/test-degree', [PersonController::class, 'testDegree']);

## Routes pour les relations
Route::get('/relationships/create', [RelationshipController::class, 'createRelationship'])->name('relationships.create');
Route::post('/relationships', [RelationshipController::class, 'storeRelationship'])->name('relationships.store');
Vues
Layout Général
Un layout général est défini dans resources/views/layouts/app.blade.php et utilisé dans toutes les vues.

## Vues Disponibles
index.blade.php : Affiche la liste des personnes.
show.blade.php : Affiche les détails d'une personne.
create.blade.php : Formulaire de création d'une personne.
relationships/create.blade.php : Formulaire pour ajouter une relation.
## Calcul du Degré de Parenté
La méthode getDegreeWith($target_person_id) dans le modèle Person calcule le degré de parenté entre deux personnes.

## - Exemple d'Utilisation
DB::enableQueryLog();
$timestart = microtime(true);

$person = App\Models\Person::findOrFail(84);
$degree = $person->getDegreeWith(1265);

var_dump([
    "degree" => $degree,
    "time" => microtime(true) - $timestart,
    "nb_queries" => count(DB::getQueryLog()),
]);

## - Tests et Debugging

Activer le Log SQL :

DB::enableQueryLog();
Afficher les Logs SQL :
dd(DB::getQueryLog());
Suivi du Temps d'Exécution : Ajoutez un suivi du temps avec microtime().

## - lien diagramme

https://dbdiagram.io/d/677801db5406798ef73675d9

## - Auteur
Ce projet a été réalisé dans le cadre d'un test technique pour l'entreprise OCD. Toutes les fonctionnalités demandées ont été implémentées avec Laravel.












