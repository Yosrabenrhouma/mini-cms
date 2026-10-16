<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    // Afficher tous les articles
    public function index(): View
    {
        return view('posts.index', [
            'heading' => 'Tous les articles',
            'posts' => Post::latest('id')->paginate(4),
        ]);
    }

    // Afficher les articles d'une année
    public function archive(string $year): View
    {
        return view('posts.index', [
            'heading' => 'Articles de '.$year,
            'posts' => Post::whereYear('published_at', $year)
                ->latest('id')
                ->paginate(4),
        ]);
    }

    // Afficher le formulaire de création
    public function create(): View
    {
        return view('posts.create');
    }

    // Enregistrer un nouvel article
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9-]+$/',
                'unique:posts,slug',
            ],
            'body' => ['required', 'string', 'min:30'],
        ]);

        Post::create($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Article ajouté avec succès !');
    }

    // Afficher un article
    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    // Afficher le formulaire de modification
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    // Modifier un article
    public function update(
        Request $request,
        Post $post
    ): RedirectResponse {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9-]+$/',
                'unique:posts,slug,'.$post->id,
            ],
            'body' => ['required', 'string', 'min:30'],
        ]);

        $post->update($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Article modifié avec succès !');
    }

    // Supprimer un article
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Article supprimé avec succès !');
    }
}
