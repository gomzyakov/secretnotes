<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NoteController::class, 'index'])->name('home');

Route::get('/new-note', [NoteController::class, 'showCreatePage'])->name('page.note.new');
Route::get('/note/{slug}', [NoteController::class, 'showLink'])->name('note.showLink');

Route::get('/about', [PageController::class, 'showAboutPage'])->name('about');

Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

// TODO To API
Route::post('/new-note', [NoteController::class, 'create'])->name('note.create');

Route::post('/note/{slug}', [NoteController::class, 'decrypt'])->name('note.decrypt');
