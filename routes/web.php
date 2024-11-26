<?php

use App\Livewire\PostComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShowPost;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider y todas ellas
| se asignan al grupo de middleware "web".
|
*/




// Ruta para ver todos los posts
Route::get('/posts', PostComponent::class)->name('posts.index');

Route::get('/posts/create', [PostComponent::class, 'create'])->name('posts.create');

// Ruta para ver un post específico por ID
Route::get('/posts/{id}', ShowPost::class)->name('posts.show');

// Ruta para la vista de home
Route::view('/home', 'livewire.home');

// Redirige la ruta '/' a '/home'
Route::get('/', function () {
    return redirect()->to('/home');
});





// Rutas protegidas por autenticación
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Rutas de autenticación
require __DIR__.'/auth.php';

