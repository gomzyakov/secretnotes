<?php

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

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/new-note', [NoteController::class, 'create'])->name('new.note');
Route::post('/new-note', [NoteController::class, 'store'])->name('note.create');

Route::get('/note/{slug}', [NoteController::class, 'show'])->name('note.display');
Route::post('/note/{slug}', [NoteController::class, 'decrypt'])->name('note.decrypt');

Route::fallback(function () {
    return redirect()->route('home');
});
