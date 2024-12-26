<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use SebastianBergmann\CodeCoverage\Node\CrapIndex;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::get('/userTesting', 'App\Http\Controllers\UserController@index');