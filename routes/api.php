<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HolidaysController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(HolidaysController::class)->group(function(){
    Route::get('/list','index'); //obtener todos los festivos
    Route::post('/search','show'); //obtiene los festivos de un pais
    Route::post('/save','store'); //guarda los festivos agrupado en un array
    Route::put('/update','update');
    Route::delete('/destroy','delete'); 
});


