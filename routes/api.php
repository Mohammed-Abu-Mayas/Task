<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
   return $request->user();
});

Route::post('login',[App\Http\Controllers\API\ApiController::class, 'login']);
Route::post('register',[App\Http\Controllers\API\ApiController::class, 'register']);

Route::middleware('auth:api')->group(function(){

   Route::post('details',[App\Http\Controllers\API\ApiController::class, 'get_user_details_info']);
   
 });