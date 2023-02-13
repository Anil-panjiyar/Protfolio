<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

 use App\Http\Controllers\ImageController;
 use App\Http\Controllers\SugController;
 use App\Http\Controllers\DisplayController;
 use App\Http\Controllers\StudentController;
 use App\Http\Controllers\BlogController;
 use App\Http\Controllers\CompanyController;
 use App\Http\Controllers\AdminController;


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

//-----------------------------starting-------------------------------//

 Route::get('/', function() {

     return view('admin');
});

Route::get('/home' , function() {

    return view('home');
});

Route::get('index', [StaffController::class, 'index'])->name('add.user');
Route::post('store',[StaffController::class,'store']);
Route::get('show',[StaffController::class,'show'])->name('staff.show');
Route::get('delete/{id}',[StaffController::class,'destroy']);
Route::get('edit/{id}',[StaffController::class,'edit']);
Route::post('update',[StaffController::class,'update']);



//---------------------------end of route-------------------------------------//
Route::get('image/{id}',[ImageController::class,'index'])->name('image.add');
Route::post('image/store',[ImageController::class,'store'])->name('image.store');


Route::get('insert',[SugController::class,'index']);
Route::post('insert',[SugController::class,'store']);

Route::get('display',[DisplayController::class,'show']);
// Route::get('ajaxCall',[DisplayController::class,'show'])->name('ajax-Call');

Route::post('save-data',[DisplayController::class,'saveData'])->name('save-data');

//-------------------------------starting----------------------------------------//
Route::get('/students',[StudentController::class,'index']);

Route::post('/add-student',[StudentController::class,'addStudent'])->name('student.add');
Route::post('/students/delete',[StudentController::class,'deleteStudent'])->name('deleteStudent');
Route::get('/get-student', [StudentController::class, 'getStudents'])->name('getStudent');

// ----------------------end --------------------------------------------------------------------//


//------------------------------inner  join adn right clause -----------------------------------------//

Route::get('/inner-join',[BlogController::class,'innerJoinCaulse'])->name('post-innerjoin');
Route::get('/left-join',[BlogController::class,'leftJoinCaulse'])->name('post-leftjoin');
Route::get('/right-join',[BlogController::class,'rightJoinCaulse'])->name('post-rightjoin');
//-------------------------------------------------------------------------------------------------//



//-----------------------------------------------------------------------//
Route::get('company',[CompanyController::class,'index'])->name('insert-data');
Route::post('add-details',[CompanyController::class,'store'])->name('add.company');

Route::get('display-company',[CompanyController::class,'show']);

//Route ::get('admin-login',[AdminController::class,'login']);
  Route ::get('company-show',[AdminController::class,'display'])->name("details.company");  // this data table
//  Route ::get('company-table',[AdminController::class,'table'])->name("table-data"); // this for another data tbale
 //this if for admin check
 Route ::post('admin-login',[AdminController::class,'checkCredential'])->name('admin-check');

//  Route::group(['middleware'=>[auth]],function(){
//     Route ::post('admin-login',[AdminController::class,'checkCredential'])->name('admin-check');
//     Route ::get('company-show',[AdminController::class,'display'])->name("details.company");
//  });

//  Route ::group(['middleware'=>['isAdmin']],function(){
//     Route ::get('company-show',[AdminController::class,'display'])->name("details.company");

//  });


