<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IngredientController;


Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/{id}', [PostController::class, 'show'])->name('posts.show');

    Route::middleware('auth:web')->group(function () {
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::post('posts/comment/{id}', [PostController::class, 'comment'])->name('comment');
});
});

Route::middleware('auth:web')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware("guest:web")->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');

    Route::get('/forgot', [\App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [\App\Http\Controllers\AuthController::class, 'forgot'])->name('forgot_process');
});

Route::get('/contacts', [\App\Http\Controllers\IndexController::class, 'showContactForm'])->name('contacts');
Route::post('/contact_form_process', [\App\Http\Controllers\IndexController::class, 'contactForm'])->name('contact_form_process');

Route::prefix('admin/ingredients')->group(function () {
    Route::get('/', [IngredientController::class, 'index'])->name('admin.ingredients.index');
    Route::get('/create', [IngredientController::class, 'create'])->name('admin.ingredients.create');
    Route::post('/store', [IngredientController::class, 'store'])->name('admin.ingredients.store');
    Route::get('/{id}', [IngredientController::class, 'show'])->name('admin.ingredients.show');
    Route::get('/{id}/edit', [IngredientController::class, 'edit'])->name('admin.ingredients.edit');
    Route::put('/{id}', [IngredientController::class, 'update'])->name('admin.ingredients.update');
    Route::delete('/{id}', [IngredientController::class, 'destroy'])->name('admin.ingredients.destroy');
});
