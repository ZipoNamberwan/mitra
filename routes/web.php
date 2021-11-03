<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);

    //
    Route::get('/mitrasurvey', [App\Http\Controllers\DashboardController::class, 'data']);
    Route::get('/survey-data', [App\Http\Controllers\SurveyController::class, 'data']);
    Route::get('/recruitment-data/{id}', [App\Http\Controllers\RecruitmentController::class, 'data']);
    Route::get('/mitra-data', [App\Http\Controllers\MitraController::class, 'data']);
    Route::get('/assessment-data/{id}', [App\Http\Controllers\AssessmentController::class, 'data']);
    //
    Route::get('/mitra-edit/{$id}', [App\Http\Controllers\MitraController::class, 'edit']);
    Route::get('/mitra-update/{$id}', [App\Http\Controllers\MitraController::class, 'update']);
    Route::get('/mitras/village/{id}', [App\Http\Controllers\MitraController::class, 'getVillage']);
    Route::get('/surveys/{id}/rate', [App\Http\Controllers\AssessmentController::class, 'getSurveyMitra']);
    //
    Route::get('/recruitment/mitras_surveys/{id}', [App\Http\Controllers\RecruitmentController::class, 'json']);

    Route::get('/recruitment/mitras_surveys/{id}', [App\Http\Controllers\RecruitmentController::class, 'json']);

    Route::post('/recruitments/accept', [App\Http\Controllers\RecruitmentController::class, 'accept']);
    Route::post('/recruitments/reject', [App\Http\Controllers\RecruitmentController::class, 'reject']);
    Route::post('/surveys/assessment', [App\Http\Controllers\AssessmentController::class, 'create']);

    Route::resources([
        'mitras' => MitraController::class,
        'surveys' => SurveyController::class,
        'recruitments' => RecruitmentController::class
    ]);
});
