<?php

use App\Http\Controllers\MitraController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitmentController;

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
Route::get('/testsurvey', [App\Http\Controllers\SurveyController::class, 'index']);
Route::get('/testmitrasurvey', [App\Http\Controllers\RecruitmentController::class, 'index']);

Route::get('/survey-data', [App\Http\Controllers\SurveyController::class, 'data']);
Route::get('/recruitment-data/{id}', [App\Http\Controllers\RecruitmentController::class, 'data']);
Route::get('/mitra-data', [App\Http\Controllers\MitraController::class, 'data']);

Route::get('/mitra-edit/{$id}', [App\Http\Controllers\MitraController::class, 'edit']);
Route::get('/mitra-update/{$id}', [App\Http\Controllers\MitraController::class, 'update']);
Route::get('/mitras/village/{id}', [App\Http\Controllers\MitraController::class, 'getVillage']);

Route::get('/recruitment/mitras_surveys/{id}', [App\Http\Controllers\RecruitmentController::class, 'json']);


Route::resources([
    'mitras' => MitraController::class,
    'surveys' => SurveyController::class,
    'recruitments' => RecruitmentController::class
]);
