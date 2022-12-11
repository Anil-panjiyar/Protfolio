<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
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



Route::get('/' , function() {

    return view("insert")->name('add.user');
});

Route::get('index', [StaffController::class, 'index'])->name('add.user');
Route::post('store',[StaffController::class,'store']);
Route::get('show',[StaffController::class,'show'])->name('staff.show');
Route::get('delete/{id}',[StaffController::class,'destroy']);
Route::get('edit/{id}',[StaffController::class,'edit']);
Route::post('update',[StaffController::class,'update']);

