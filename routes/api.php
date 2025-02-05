<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\API\MediaController;
use App\Http\Controllers\API\PlaceController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\ContactController;


//===========ARTICLE===========
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

//===========MEDIA===========

Route::get('/media', [MediaController::class, 'index'])->name('media.index');
Route::post('/media', [MediaController::class, 'store'])->name('media.store');
Route::get('/media/{media}', [MediaController::class, 'show'])->name('media.show');
Route::put('/media/{media}', [MediaController::class, 'update'])->name('media.update');
Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');

//===========CONTACT===========

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/{contact}', [ContactController::class, 'show'])->name('contact.show');
Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');

//===========PLACE===========

Route::get('/places', [PlaceController::class, 'index'])->name('places.index');
Route::post('/places', [PlaceController::class, 'store'])->name('places.store');
Route::get('/places/{place}', [PlaceController::class, 'show'])->name('places.show');
Route::put('/places/{place}', [PlaceController::class, 'update'])->name('places.update');
Route::delete('/places/{place}', [PlaceController::class, 'destroy'])->name('places.destroy');


//===========USER===========

Route::post('/login', [AuthController::class, 'login']); 
Route::middleware('auth:api')->group(function() { 
    Route::get('/currentuser', [UserController::class, 'currentUser']); 
    Route::post('/logout', [AuthController::class, 'logout']); 
    });