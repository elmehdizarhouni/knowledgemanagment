<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/employes', 'EmployeController@index');
Route::get('/employes/create', 'EmployeController@create');
Route::post('/employes', 'EmployeController@store');
Route::get('/employes/{id}', 'EmployeController@show');
Route::get('/employes/{id}/edit', 'EmployeController@edit');
Route::put('/employes/{id}', 'EmployeController@update');
Route::delete('/employes/{id}', 'EmployeController@destroy');
Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');
Route::get('/formations/create', [FormationController::class, 'create'])->name('formations.create');
Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');
Route::get('/formations/{formation}', [FormationController::class, 'show'])->name('formations.show');
Route::get('/formations/{formation}/edit', [FormationController::class, 'edit'])->name('formations.edit');
Route::put('/formations/{formation}', [FormationController::class, 'update'])->name('formations.update');
Route::delete('/formations/{formation}', [FormationController::class, 'destroy'])->name('formations.destroy');

Auth::routes();

