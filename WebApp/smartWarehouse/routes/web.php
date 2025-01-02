<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
// use SebastianBergmann\CodeCoverage\Node\CrapIndex;


//default
Route::get('/', function () {
    return view('welcome');
});

//TestTest
Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::get('/userTesting', 'App\Http\Controllers\UserController@index');

// Products
//home
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//cre
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
//edit
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
//delete
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
