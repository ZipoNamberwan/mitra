<?php

use App\Http\Controllers\MitraController;
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

Route::get('/test', [App\Http\Controllers\MitraController::class, 'index']);

Route::get('/mitra-data', [App\Http\Controllers\MitraController::class, 'data']);
Route::get('/mitras/GetSubCatAgainstMainCatEdit/{id}', [App\Http\Controllers\MitraController::class, 'GetSubCatAgainstMainCatEdit']);

Route::resources([
    'mitras' => MitraController::class,
]);