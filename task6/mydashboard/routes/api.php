<?php

use App\Http\Controllers\productcontrollerapi;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('products/index',[productcontrollerapi::class,'index']);
Route::get('products/create',[productcontrollerapi::class,'create']);
Route::post('products/store',[productcontrollerapi::class,'store']);
Route::get('products/edit{id}',[productcontrollerapi::class,'edit']);
Route::post('products/update{id}',[productcontrollerapi::class,'update']);
Route::get('products/destroy{id}',[productcontrollerapi::class,'destroy']);
