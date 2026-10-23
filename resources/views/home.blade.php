
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Mini CMS</title>
</head>
<body>
    <h1>Bienvenue sur Mini CMS</h1>

    <nav>
        <a href="{{ route('home') }}">Accueil</a> |
        <a href="{{ route('about') }}">À propos</a> |
        <a href="{{ route('time') }}">Heure</a> |
        <a href="{{ route('posts.index') }}">Articles</a>
    </nav>

    <h2>Derniers articles</h2>

    @forelse ($posts as $post)
        <article>
            <h3>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </h3>

            <p>{{ $post->excerpt }}</p>
        </article>
    @empty
        <p>Aucun article publié pour le moment.</p>
    @endforelse
</body>
</html>
