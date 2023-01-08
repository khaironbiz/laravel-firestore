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
Route::get('tests', [\App\Http\Controllers\TestController::class, 'index'])->name('user.index');
Route::get('test', [\App\Http\Controllers\TestController::class, 'create'])->name('user.create');
Route::post('test', [\App\Http\Controllers\TestController::class, 'store'])->name('user.store');
Route::get('test/{id}', [\App\Http\Controllers\TestController::class, 'show'])->name('user.show');
Route::post('test/{id}/update', [\App\Http\Controllers\TestController::class, 'update'])->name('user.update');
Route::post('test/{id}/destroy', [\App\Http\Controllers\TestController::class, 'destroy'])->name('user.destroy');
