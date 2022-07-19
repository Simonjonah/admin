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

// Route::middleware('auth:api')->post('/qrcodes/token', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->resource('qrcodes', QrcodeController::class);

//Route::middleware('auth:api')->resource('qrcodes/index', QrcodeController::class);

Route::middleware('auth:api')->post('/qrcodes/store',  [App\Http\Controllers\QrcodeController::class, 'store']);

//Route::get('/users/token', 'UserController@token');
