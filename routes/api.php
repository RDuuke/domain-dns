<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Domain\AllController;
use App\Http\Controllers\Domain\CreateController;
use App\Http\Controllers\Domain\DeleteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/domain')->group(function() {
    Route::get('/', AllController::class);
    Route::post('/', CreateController::class);
    Route::delete('/{uuid}/delete', DeleteController::class);
});