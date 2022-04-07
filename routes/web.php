<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TerrazaCotoRelController;

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
    return view('index');
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::group(['middleware' => 'jwt.verify'], function () {
    Route::get('/datos', [AuthController::class, 'datos']);
    Route::get('/show', [TerrazaCotoRelController::class, 'show']);
    Route::post('/apartarFecha', [TerrazaCotoRelController::class, 'apartarFecha']);
    Route::get('/explorarFechas', [TerrazaCotoRelController::class, 'explorarFechas']);
    Route::put('/estatusAgenda', [TerrazaCotoRelController::class, 'estatusAgenda']);

    Route::post('/logout', [AuthController::class, 'logout']);
});