<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\NotebookController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/offline', function () {
    return view('offline');
});


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/login', [AuthController::class, 'loginView'])->name('login-view');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/notebooks/{id}/edit', [NotebookController::class, 'edit'])->name('notebooks.edit');
    Route::put('/notebooks/{id}', [NotebookController::class, 'update'])->name('notebooks.update');
    Route::get('/notebooks/create', [NotebookController::class, 'create'])->name('notebooks.create');
    Route::post('/notebooks', [NotebookController::class, 'store'])->name('notebooks.store');
    Route::get('/notebooks', [NotebookController::class, 'index'])->name('notebooks.index');
    Route::delete('/notebooks/{id}', [NotebookController::class, 'destroy'])->name('notebooks.destroy');

    Route::get('/notebooks/{uuid}/notes', [NoteController::class, 'index'])->name('notebooks.notes');

    Route::get('/notebooks/{uuid}/notes/create', [NoteController::class, 'create'])->name('notes.create');

    Route::get('/notebooks/{uuid}/notes/{id}/show', [NoteController::class, 'show'])->name('notes.show');

    Route::get('/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');
});
