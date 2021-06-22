<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('base');
});

Route::get('/user/random', [UserController::class, 'getRandom'])
    ->name('random.user');

Route::get(
    'user/most-popular/{benchmark?}',
    [UserController::class, 'getMostPopular']
)->name('most.popular.users');

Route::resource('user', App\Http\Controllers\UserController::class)
    ->only(['index', 'show']);
