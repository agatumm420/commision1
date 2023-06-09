<?php

use App\Http\Controllers\KmController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::post('/users/register', [UserController::class, 'register'])->name('user.register');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
//Route::view('/activate/{token}', 'activationLink')->name('activationLink');
Route::post('/add-km/{user}', [KmController::class, 'add_km']);
Route::get('/activate/{token}', [UserController::class, 'activate'])->name('user.activate');
Route::view('/activation', 'activationLink')->name('activationLink');




