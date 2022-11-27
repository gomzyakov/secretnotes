<?php

use App\Http\Controllers\NoteController;
use App\Services\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;

/**
 * ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP.
 */
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', function () {
        return 'hello ' . LaravelLocalization::getCurrentLocale();
    });

    Route::get('test',function () {
        return 'test ' . LaravelLocalization::getCurrentLocale();
    });
});



// TODO Route::get('/', [NoteController::class, 'index'])->name('home');

Route::get('/new-note', [NoteController::class, 'showCreatePage'])->name('page.note.new');
Route::get('/note/{slug}', [NoteController::class, 'openLink'])->name('note.open_link');

Route::post('/notes', [NoteController::class, 'createNote'])->name('note.create');
Route::post('/note/{slug}', [NoteController::class, 'decrypt'])->name('note.decrypt');
