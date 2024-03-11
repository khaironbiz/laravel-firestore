<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\Web\UserController;
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
Route::get('users', [UserController::class, 'index']);
Route::get('user/create', [UserController::class, 'create']);
Route::post('users', [UserController::class, 'store'])->name('user.foto');
Route::get('tests', [TestController::class, 'index'])->name('user.index');
Route::get('test', [TestController::class, 'create'])->name('user.create');
Route::post('test', [TestController::class, 'store'])->name('user.store');
Route::get('test/{id}', [TestController::class, 'show'])->name('user.show');
Route::post('test/{id}/update', [TestController::class, 'update'])->name('user.update');
Route::post('test/{id}/destroy', [TestController::class, 'destroy'])->name('user.destroy');
Route::post('upload', [TestController::class, 'storeFile'])->name('user.store.file');
