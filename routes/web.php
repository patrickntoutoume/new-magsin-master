<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/' ,[AppController::class, 'index'])-> name('home');

Route::get('/save' ,[CategoryController::class, 'produit'])-> name('prod');

Route::get('/liste', [CategoryController::class, 'liste_prod'])->name('liste');

Route::post('save_prod', [CategoryController::class, 'save_produit'])->name('save');

Route::get('supprimer/{id}', [CategoryController::class, 'supprimer'])->name('supprimer');

Route::get('update/{id}', [CategoryController::class, 'update'])->name('update');

Route::put('update_prod/{id}', [CategoryController::class, 'update_prod'])->name('update_prod');

Route::resource('post', PostController::class);



