<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestApiController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/releves', [TestApiController::class, 'index']);
    Route::post('/addReleve', [TestApiController::class, 'addReleve']);
    Route::get('/sites', [TestApiController::class, 'getSites']);
    Route::get('/sites', [TestApiController::class, 'indexSites']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/sites/{id}', [TestApiController::class, 'getSite']);
    Route::put('/sites/{id}', [TestApiController::class, 'updateSite']);
    Route::get('/sites/{id}/capteurs', [TestApiController::class, 'getCapteursBySite']);
    Route::post('/sites', [TestApiController::class, 'addSite']);
    Route::get('/capteurs/{id}/donnees', [TestApiController::class, 'getCapteurDonnees']);
});
