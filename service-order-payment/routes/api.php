<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebHookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all f them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('orders', [OrderController::class, 'create']);
Route::get('orders', [OrderController::class, 'index']);
Route::post('webhook', [WebHookController::class, 'midTransHandler']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
