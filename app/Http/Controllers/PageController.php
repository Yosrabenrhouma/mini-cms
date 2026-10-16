<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PostController;
class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('a-propos', [
            'auteur' => 'Prenom Nom',
            'groupe' => 'MDW32',
        ]);
    } 
    
}