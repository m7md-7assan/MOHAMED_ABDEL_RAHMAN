<?php

use App\Http\Controllers\admins\dashboardcontroller;
use App\Http\Controllers\admins\productcontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard',[productcontroller::class,'index'])->name('dashboard');
Route::get('dashboard/products/index',[productcontroller::class,'index'])->name('dashboard.products.index');
Route::get('dashboard/products/create',[productcontroller::class,'create'])->name('dashboard.products.create');
Route::post('dashboard/products/store',[productcontroller::class,'store'])->name('dashboard.products.store');
Route::post('dashboard/products/update',[productcontroller::class,'update'])->name('dashboard.products.update');
Route::get('dashboard/products/edit/{id}',[productcontroller::class,'edit'])->name('dashboard.products.edit');

