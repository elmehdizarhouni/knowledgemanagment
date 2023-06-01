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
Route::get('change-password', [App\Http\Controllers\EmployeController::class, 'changePassword'])->name('Employe.changePassword');
Route::post('update-password', [App\Http\Controllers\EmployeController::class, 'updatePassword'])->name('Employe.updatePassword');



Route::resource('Employe.formations', 'FormationController')->shallow();
Route::resource('Employe.competences', 'CompetenceController')->shallow();

Route::prefix('employes')->group(function () {
    // Routes pour les formations
    Route::get('{employe}/formations/create', [App\Http\Controllers\EmployeController::class, 'createFormation'])->name('formations.create');
    Route::post('{employe}/formations', [App\Http\Controllers\EmployeController::class, 'storeFormation'])->name('formations.store');
    Route::get('{employe}/formations/{formation}/edit', [App\Http\Controllers\EmployeController::class, 'editFormation'])->name('formations.edit');
    Route::put('{employe}/formations/{formation}', [App\Http\Controllers\EmployeController::class, 'updateFormation'])->name('formations.update');
    Route::delete('{employe}/formations/{formation}', [App\Http\Controllers\EmployeController::class, 'destroyFormation'])->name('formations.destroy');

    // Routes pour les compétences
    Route::get('{employe}/competences/create', [App\Http\Controllers\EmployeController::class, 'createCompetence'])->name('competences.create');
    Route::post('{employe}/competences', [App\Http\Controllers\EmployeController::class, 'storeCompetence'])->name('competences.store');
    Route::get('{employe}/competences/{competence}/edit', [App\Http\Controllers\EmployeController::class, 'editCompetence'])->name('competences.edit');
    Route::put('{employe}/competences/{competence}', [App\Http\Controllers\EmployeController::class, 'updateCompetence'])->name('competences.update');
    Route::delete('{employe}/competences/{competence}', [App\Http\Controllers\EmployeController::class, 'destroyCompetence'])->name('competences.destroy');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard/employee', [App\Http\Controllers\EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/dashboard/evaluator', [App\Http\Controllers\EvaluatorController::class, 'dashboard'])->name('evaluator.dashboard');
});
Route::get('/evaluations/create', [App\Http\Controllers\EmployeController::class, 'createEvaluation'])->name('evaluations.create');
Route::post('/evaluations/create', [App\Http\Controllers\EmployeController::class, 'storeEvaluation'])->name('evaluations.store');

// Routes pour afficher la liste des évaluations

Route::get(' /evaluations', 'EmployeController@show')->name('evaluations.index');

// Route pour afficher le formulaire de création d'une évaluation
// Routes pour afficher les détails d'une évaluation
Route::get('/evaluations/{evaluation}', 'EmployeController@show')->name('evaluations.show');

// Route pour afficher le formulaire de modification d'une évaluation
Route::get('/evaluations/{evaluation}/edit', 'EmployeController@edit')->name('evaluations.edit');

// Route pour mettre à jour une évaluation
Route::put('/evaluations/{evaluation}', 'EmployeController@update')->name('evaluations.update');

// Route pour supprimer une évaluation
Route::delete('/evaluations/{evaluation}', 'EmployeController@destroy')->name('evaluations.destroy');






/*

Route::get('/evaluations/create', 'EvaluationController@create')->name('evaluations.create');
Route::post('/evaluations', 'EvaluationController@store')->name('evaluations.store');
Route::get('/evaluations/{evaluation}', 'EvaluationController@show')->name('evaluations.show');
Route::get('/evaluations/{evaluation}/edit', 'EvaluationController@edit')->name('evaluations.edit');
Route::put('/evaluations/{evaluation}', 'EvaluationController@update')->name('evaluations.update');
Route::delete('/evaluations/{evaluation}', 'EvaluationController@destroy')->name('evaluations.destroy');
*/