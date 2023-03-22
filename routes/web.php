<?php

use App\Http\Controllers\candidateController;
use App\Http\Controllers\positionsController;
use App\Http\Controllers\resultController;
use App\Http\Controllers\schoolAdminsController;
use App\Http\Controllers\schoolController;
use App\Http\Controllers\voterssController;
use Illuminate\Support\Facades\Auth;
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
Route::get('schooladmin-datatable', [schoolAdminsController::class, 'index']);
Route::post('store-schooladmin', [schoolAdminsController::class, 'store']);
Route::post('edit-schooladmin', [schoolAdminsController::class, 'edit']);
Route::post('delete-schooladmin', [schoolAdminsController::class, 'destroy']);

//voter
Route::get('voter-datatable', [voterssController::class, 'index']);
Route::post('store-voter', [voterssController::class, 'store']);
Route::post('edit-voter', [voterssController::class, 'edit']);
Route::post('delete-voter', [voterssController::class, 'destroy']);

//position
Route::get('position-datatable', [positionsController::class, 'index']);
Route::post('store-position', [positionsController::class, 'store']);
Route::post('edit-position', [positionsController::class, 'edit']);
Route::post('delete-position', [positionsController::class, 'destroy']);

//candidate
Route::get('candidate-datatable', [candidateController::class, 'index']);
Route::post('store-candidate', [candidateController::class, 'store']);
Route::post('edit-candidate', [candidateController::class, 'edit']);
Route::post('delete-candidate', [candidateController::class, 'destroy']);

//result
Route::get('result-datatable', [resultController::class, 'index'])->name('results_index');
Route::post('store-result', [resultController::class, 'store']);
Route::post('edit-result', [resultController::class, 'edit']);
Route::post('delete-result', [resultController::class, 'destroy']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/school', [App\Http\Controllers\schoolController::class, 'index'])->name('school');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
