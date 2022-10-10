<?php

use App\Http\Controllers\Domain\AllController;
use App\Http\Controllers\Domain\CreateController;
use App\Http\Controllers\Domain\DeleteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::delete('/{id}/delete', DeleteController::class);
});