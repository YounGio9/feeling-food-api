<?php

use App\Http\Controllers\API\clientController;
use App\Http\Controllers\API\reservationController;
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
/**
 * Routes pour les réservations
 */
Route::get('reservations', [reservationController::class, 'index']);
Route::post('reservations', [reservationController::class, 'create']);
/**
 * Routes pour les clients
 */
Route::get("clients", [clientController::class, 'index']);