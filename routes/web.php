<?php

use App\Http\Controllers\candidateController;
use App\Http\Controllers\positionsController;
use App\Http\Controllers\resultController;
use App\Http\Controllers\schoolAdminsController;
use App\Http\Controllers\schoolController;
use App\Http\Controllers\voterssController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index'); 
});
//schools
Route::get('school-datatable', [schoolController::class, 'index']);
Route::post('store-school', [schoolController::class, 'store']);
Route::post('edit-school', [schoolController::class, 'edit']);
Route::post('delete-school', [schoolController::class, 'destroy']);

//schooladmin
Route::get('schoolAdmins-datatable', [schoolAdminsController::class, 'index']);
Route::post('store-schoolAdmins', [schoolAdminsController::class, 'store']);
Route::post('edit-schoolAdmins', [schoolAdminsController::class, 'edit']);
Route::post('delete-schoolAdmins', [schoolAdminsController::class, 'destroy']);

//voters
Route::get('voters-datatable', [voterssController::class, 'index']);
Route::post('store-voters', [voterssController::class, 'store']);
Route::post('edit-voters', [voterssController::class, 'edit']);
Route::post('delete-voters', [voterssController::class, 'destroy']);

//positions
Route::get('positions-datatable', [positionsController::class, 'index']);
Route::post('store-positions', [positionsController::class, 'store']);
Route::post('edit-positions', [positionsController::class, 'edit']);
Route::post('delete-positions', [positionsController::class, 'destroy']);

//candidate
Route::get('candidate-datatable', [candidateController::class, 'index']);
Route::post('store-candidate', [candidateController::class, 'store']);
Route::post('edit-candidate', [candidateController::class, 'edit']);
Route::post('delete-candidate', [candidateController::class, 'destroy']);

//result
Route::get('result-datatable', [resultController::class, 'index']);
Route::post('store-result', [resultController::class, 'store']);
Route::post('edit-result', [resultController::class, 'edit']);
Route::post('delete-result', [resultController::class, 'destroy']);


// positions
Route::get('/position',[positionsController::class,'index'])->name("position_index");
Route::get('/position/create',[positionsController::class,'create'])->name("position_create");

//candidate
Route::get('/candidate',[candidateController::class,'index'])->name("candidate_index");
Route::get('/candidate/create',[candidateController::class,'create'])->name("candidate_create");

//school
Route::get('/school',[schoolController::class,'index'])->name("school_index");
Route::get('/school/create',[schoolController::class,'create'])->name("school_create");

//voters
Route::get('/voters',[voterssController::class,'index'])->name("voters_index");
Route::get('/voters/create',[voterssController::class,'create'])->name("voters_create");

//school Admin

Route::get('/schoolAdmins',[schoolAdminsController::class,'index'])->name("schoolAdmins_index");
Route::get('/schoolAdmins/create',[schoolAdminsController::class,'create'])->name("schoolAdmins_create");

//result
Route::get('/result',[resultController::class,'index'])->name("result_index");
Route::get('/result/create',[resultController::class,'create'])->name("result_create");



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
