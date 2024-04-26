<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HolidaysController;

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

Route::controller(HolidaysController::class)->group(function(){
    Route::get('/festivos','index'); //obtener todos los festivos
    Route::get('/festivo','show'); //obtiene los festivos de un pais
});
