<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\CompetenceController;
use Illuminate\Support\Facades\Auth;


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
Route::get('/Employe/index', [App\Http\Controllers\EmployeController::class, 'index'])->name('Employe.index');
Route::get('/Employe/create', [App\Http\Controllers\EmployeController::class, 'create'])->name('Employe.create');
Route::get('/Employe/edit/{id}', [App\Http\Controllers\EmployeController::class, 'edit'])->name('Employe.edit');
Route::delete('/Employe/delete/{id}', [App\Http\Controllers\EmployeController::class, 'destroy'])->name('Employe.destroy');
Route::put('/Employe/update/{id}', [App\Http\Controllers\EmployeController::class, 'update'])->name('Employe.update');
Route::post('/Employe/store', [App\Http\Controllers\EmployeController::class, 'store'])->name('Employe.store');
Route::get('/Employe/show/{id}', [App\Http\Controllers\EmployeController::class, 'show'])->name('Employe.show');

Route::resource('Employe.formations', 'FormationController')->shallow();
Route::resource('Employe.competences', 'CompetenceController')->shallow();

/*Route::get('/employes', 'EmployeController@index');
Route::get('/employes/create', 'EmployeController@create');
Route::post('/employes', 'EmployeController@store');
Route::get('/employes/{id}', 'EmployeController@show');
Route::get('/employes/{id}/edit', 'EmployeController@edit');
Route::put('/employes/{id}', 'EmployeController@update');
Route::delete('/employes/{id}', 'EmployeController@destroy');*/
Route::prefix('employes')->group(function () {
    // Routes pour les formations
    Route::get('{employe}/formations/create', [EmployeController::class, 'createFormation'])->name('formations.create');
    Route::post('{employe}/formations', [EmployeController::class, 'storeFormation'])->name('formations.store');
    Route::get('{employe}/formations/{formation}/edit', [EmployeController::class, 'editFormation'])->name('formations.edit');
    Route::put('{employe}/formations/{formation}', [EmployeController::class, 'updateFormation'])->name('formations.update');
    Route::delete('{employe}/formations/{formation}', [EmployeController::class, 'destroyFormation'])->name('formations.destroy');

    // Routes pour les compétences
    Route::get('{employe}/competences/create', [EmployeController::class, 'createCompetence'])->name('competences.create');
    Route::post('{employe}/competences', [EmployeController::class, 'storeCompetence'])->name('competences.store');
    Route::get('{employe}/competences/{competence}/edit', [EmployeController::class, 'editCompetence'])->name('competences.edit');
    Route::put('{employe}/competences/{competence}', [EmployeController::class, 'updateCompetence'])->name('competences.update');
    Route::delete('{employe}/competences/{competence}', [EmployeController::class, 'destroyCompetence'])->name('competences.destroy');
});

Auth::routes();