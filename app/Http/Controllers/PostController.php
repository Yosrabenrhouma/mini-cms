<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;
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
       public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9-]+$/', Rule::unique('posts', 'slug')->ignore($post)],            'excerpt' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string', 'min:20'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        $validated['published_at'] = $validated['is_published'] ? ($post->published_at ?? now()) : null;

        $post->update($validated);

        return redirect()->route('posts.show', $post);
    }
    // Supprimer un article
       public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
