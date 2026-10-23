<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\View\View;

class PageController extends Controller
{
 public function home(): View
{
    return view('home', [
        'posts' => collect(),
    ]);
}

    public function about(): View
    {
        return view('a-propos', [
            'auteur' => 'Yosra Ben Rhouma',
            'groupe' => 'MDW32',
        ]);
    }

    public function time(): View
    {
        return view('heure', [
            'heure' => now()->format('H:i'),
            'date' => now()->format('d/m/Y'),
        ]);
    }
}
