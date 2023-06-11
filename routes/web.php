<?php

use App\Http\Controllers\LicznikController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Backpack\CRUD\app\Http\Controllers\Auth\LoginController;


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


Route::get('/', function () {
    return view('login');
});


Route::post('/login', [LicznikController::class, 'login']);
Route::get('/licznik', [LicznikController::class, 'licznik'])->middleware('auth.user2');

Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['message' => 'Successfully connected to the database.'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Could not connect to the database: ' . $e->getMessage()], 500);
    }
});
Route::group([
    'namespace' => 'Backpack\CRUD\app\Http\Controllers\Auth',
    'middleware' => ['web'],
], function () {
    // Login Routes
    Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('backpack.auth.login');
    Route::post('admin/login', [LoginController::class, 'login'])->name('backpack.auth.login');
    // Other authentication routes (register, reset password, etc.) can be added here
});
// web.php
//Route::middleware(['guest'])->group(function () {
//    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//    Route::post('/login', 'Auth\LoginController@login');
//});

