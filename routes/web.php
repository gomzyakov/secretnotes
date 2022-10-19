<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NoteController::class, 'index'])->name('home');

Route::get('/new-note', [NoteController::class, 'showCreatePage'])->name('page.note.new');
Route::get('/note/show-link/{slug}', [NoteController::class, 'showLink'])->name('page.note.show_link');
Route::get('/note/{slug}', [NoteController::class, 'openLink'])->name('note.open_link');

// TODO To API
Route::post('/note/{slug}', [NoteController::class, 'decrypt'])->name('note.decrypt');
