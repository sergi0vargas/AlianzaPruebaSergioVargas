<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    'users' => App\Http\Controllers\UserController::class,
    'roles' => App\Http\Controllers\RoleController::class,
]);

Route::post('roles/borrarcargo', ['as' => 'roles.borrarcargo', 'uses' => 'App\Http\Controllers\RoleController@borrarcargo']);
Route::post('roles/adduser', ['as' => 'roles.adduser', 'uses' => 'App\Http\Controllers\RoleController@adduser']);
