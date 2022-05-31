<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NoteController::class, 'index'])->name('home');

Route::get('/new-note', [NoteController::class, 'create'])->name('new.note');

// TODO To API
Route::post('/new-note', [NoteController::class, 'store'])->name('note.create');

Route::get('/note/{slug}', [NoteController::class, 'showLink'])->name('note.showLink');
Route::post('/note/{slug}', [NoteController::class, 'decrypt'])->name('note.decrypt');

Route::get('/about', [BlogController::class, 'showAboutPage'])->name('about');

Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');
