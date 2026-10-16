
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - Mini CMS</title>
</head>
<body>
    <h1>À propos de mon projet</h1>

    <p>Ce projet est un Mini CMS réalisé avec Laravel.</p>
    <p>Auteur : {{ $auteur }}</p>
    <p>Groupe : {{ $groupe }}</p>

    <nav>
        <a href="/">Accueil</a> |
        <a href="/a-propos">À propos</a> |
        <a href="/heure">Heure</a> |
        <a href="/posts">Articles</a>
    </nav>
</body>

@extends('layouts.app')

@section('title', 'À propos - Mini-CMS')

@section('content')
    <h1>À propos de Mini-CMS</h1>
@endsection
</html>
