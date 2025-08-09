<?php

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

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');

// Get Category
Route::get('/categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);

// Get Products
Route::get('/products', [\App\Http\Controllers\Api\ProductController::class, 'index']);

// Address
Route::apiResource('/addresses', \App\Http\Controllers\Api\AddressController::class)->middleware('auth:sanctum');

// Create Order
Route::post('/orders', [\App\Http\Controllers\Api\OrderController::class, 'order'])->middleware('auth:sanctum');

// Callback
Route::post('/callback', [\App\Http\Controllers\Api\CallbackController::class, 'callback']);


// Check Status Order
Route::get('/orders/{id}/status', [\App\Http\Controllers\Api\OrderController::class, 'checkStatusOrder'])->middleware('auth:sanctum');

// Update FCM Id
Route::put('/update-fcm', [\App\Http\Controllers\Api\AuthController::class, 'updateFcmId'])->middleware('auth:sanctum');

// Get Order By User
Route::get('/orders', [\App\Http\Controllers\Api\OrderController::class, 'getOrderByUser'])->middleware('auth:sanctum');

// Get Order By Id
Route::get('/orders/{id}', [\App\Http\Controllers\Api\OrderController::class, 'getOrderById'])->middleware('auth:sanctum');

// Get District By Id
Route::get('/districts/{id}', [\App\Http\Controllers\Api\AddressController::class, 'getDistrictById']);
