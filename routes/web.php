<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NoteController::class, 'index'])->name('home');

Route::get('/new-note', [NoteController::class, 'showCreatePage'])->name('page.note.new');
Route::get('/note/{slug}', [NoteController::class, 'openLink'])->name('note.open_link');

Route::post('/notes', [NoteController::class, 'createNote'])->name('note.create');
Route::post('/note/{slug}', [NoteController::class, 'decrypt'])->name('note.decrypt');
