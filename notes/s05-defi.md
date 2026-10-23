# Session 05 - Défi : articles récents sur l'accueil

latestPosts contient au plus 3 articles : oui / non
Seuls les articles publiés sont transmis à la vue : oui / non
home.blade.php utilise x-post-card et @forelse : oui / non
Le nouveau test passe et php artisan test est vert : oui / non

Pourquoi get() et pas paginate(3) sur la page d'accueil ?
## État actuel (tag lab-03)

- Articles enregistrés dans une base SQLite et lus avec le modèle Eloquent `Post`.
- Table `posts` créée par une migration : après un clone, `php artisan migrate` la recrée (vide).
- Liste paginée, détail par liaison modèle-route, formulaire de création avec validation côté serveur.
- Premiers tests Pest : `php artisan test`.

## Routes disponibles

| Méthode | URI | Nom | Action |
|---|---|---|---|
| GET | `/` | `home` | `PageController@home` |
| GET | `/a-propos` | `about` | `PageController@about` |
| GET | `/heure` | `time` | `PageController@time` |
| GET | `/posts` | `posts.index` | `PostController@index` |
| GET | `/posts/archive/{year}` | `posts.archive` | `PostController@archive` |
| GET | `/posts/create` | `posts.create` | `PostController@create` |
| POST | `/posts` | `posts.store` | `PostController@store` |
| GET | `/posts/{post}` | `posts.show` | `PostController@show` |
### Session 05

![Liste paginée des articles](screenshots/s05-articles.png)

![Formulaire avec erreurs de validation](screenshots/s05-formulaire.png)