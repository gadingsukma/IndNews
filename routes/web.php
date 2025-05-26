<?php

use App\Http\Controllers\frontController;
use Illuminate\Support\Facades\Route;

Route::get('/', [frontController::class, 'index'])
  ->name('front.index');

Route::get('/details/{article_news:slug}', [frontController::class, 'details'])
  ->name('front.details');

Route::get('/category/{category:slug}', [frontController::class, 'category'])
  ->name('front.category');

Route::get('/author/{author:slug}', [frontController::class, 'author'])
  ->name('front.author');

Route::get('/search', [frontController::class, 'search'])
  ->name('front.search');
