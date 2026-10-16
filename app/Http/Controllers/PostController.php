<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
  
public function index()
{
    return view('posts.index', [
        'heading' => 'Tous les articles',
        'posts' => $this->posts(),
    ]);
}

public function archive(int $year)
{
    return view('posts.index', [
        'heading' => "Articles de $year",
        'posts' => array_filter($this->posts(), fn ($p) => $p['year'] === $year),
    ]);
}

public function show(string $slug)
{
    $posts = $this->posts();
    abort_unless(isset($posts[$slug]), 404);

    return view('posts.show', ['post' => $posts[$slug]]);
}

private function posts(): array
{
    return [
        'premier-article' => ['title' => 'Mon premier article', 'year' => 2025, 'content' => 'Contenu 1'],
        'laravel-routes'  => ['title' => 'Routes Laravel', 'year' => 2025, 'content' => 'Contenu 2'],
        'blade-components' => ['title' => 'Composants Blade', 'year' => 2026, 'content' => 'Contenu 3'],
    ];
}}