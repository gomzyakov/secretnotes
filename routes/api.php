<?php

use App\Http\Controllers\API\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/notes', [NoteController::class, 'create'])->name('api.note.create');
Route::post('/notes', [NoteController::class, 'fakeCreate'])->name('api.note.create');
