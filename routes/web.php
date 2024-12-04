<?php

use App\Livewire\PostComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\ShowPost;
use App\Livewire\UserPosts;
use App\Livewire\CreatePost;

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



// Ruta para ver un post específico por ID
Route::get('/posts/{id}', ShowPost::class)->name('posts.show');


Route::get('/profile/posts/{userId}', UserPosts::class)->name('user-posts');
Route::get('/create', function(){
    return view('index');
})->name('create.post');








// Redirige la ruta '/' a '/home'
Route::get('/', function () {
    return redirect()->to('/posts');
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

