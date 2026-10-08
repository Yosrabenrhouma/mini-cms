<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/git add -A
git commit -m "Deplacer les pages vers PageController"', function () {
    return 'Bonjour MDW3 ! Voici ma première route Laravel 13.';
});

Route::get('/bonjour-court', fn () => 'Même résultat, écrit avec une fonction fléchée.');

Route::get('/bienvenue', function () {
    return view('bienvenue', [
        'etudiant' => 'yosra benrhouma',
        'groupe' => 'MDW32',
        'cours' => 'Atelier Framework Côté Serveur',
    ]);
});

Route::get('/version', function () {
    return app()->version() . ' - PHP ' . PHP_VERSION;
});

Route::get('/heure', function () {
    return now()->format('H:i') . ' - ' . now()->format('d/m/Y');
});
Route::get('/a-propos', function () {
    return view('a-propos', [
        'auteur' => 'Prenom Nom',
        'groupe' => 'MDW32',
    ]);
});