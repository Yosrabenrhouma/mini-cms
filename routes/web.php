
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);

Route::get('/a-propos', [PageController::class, 'about']);

Route::get('/heure', function () {
    return view('heure', [
        'heure' => now()->format('H:i'),
        'date' => now()->format('d/m/Y'),
    ]);
});
