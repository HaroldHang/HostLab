<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthController;
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
    return view('auth.login');
});

/* Tests routing */
Route::get('/tests', 'TestController@index')->name('test.index');
Route::get('/tests/create', 'TestController@create');
//Route::get('/tests', 'TestController@index');
Route::post('/tests/store', 'TestController@store');
Route::get('/tests/{test}/edit', 'TestController@edit')->name('test.edit');
Route::post('/tests/{test}/update', 'TestController@update')->name('test.update');
Route::put('/tests/{test}/delete', 'TestController@destroy')->name('test.destroy');

/* Echantillons Types routing */

Route::get('/echantillons type', 'EchantillonController@index')->name('echantillonType.index');
Route::get('/echantillons type/create', 'EchantillonController@create');
Route::post('/echantillons type/store', 'EchantillonController@store');
Route::get('/echantillons type/edit/{echant}', 'EchantillonController@edit')->name('echantillonType.edit');
Route::post('/echantillons type/update/{echant}', 'EchantillonController@update')->name('echantillonType.update');
Route::put('/echantillons type/delete/{echant}', 'EchantillonController@destroy')->name('echantillonType.destroy');

/* Demandes Analyses routing */

Route::get('/Demandes Analyse', 'DemandeAnalyseController@index')->name('demande.index');
Route::get('/Demandes Analyse/create', 'DemandeAnalyseController@create');
Route::get('/Demandes Analyse/newpatient', 'DemandeAnalyseController@newPatient');
Route::post('/Demandes Analyse/store', 'DemandeAnalyseController@store');
//Route::get('/Demandes Analyse/edit/{test}', 'DemandeAnalyseController@edit')->name('demande.edit');
//Route::post('/Demandes Analyse/update/{test}', 'DemandeAnalyseController@update')->name('demande.update');
//Route::put('/Demandes Analyse/delete/{test}', 'DemandeAnalyseController@destroy')->name('demande.destroy');
/* Patient Controller */
//Route::get('/Demandes Analyse', 'DemandeAnalyseController@index')->name('demande.index');
//Route::get('/Demandes Analyse/create', 'DemandeAnalyseController@create');
//Route::get('/Demandes Analyse/newpatient', 'DemandeAnalyseController@newPatient');
Route::post('/Patients/store', 'PatientController@store');
//Route::get('/Demandes Analyse/edit/{test}', 'DemandeAnalyseController@edit')->name('demande.edit');
//Route::post('/Demandes Analyse/update/{test}', 'DemandeAnalyseController@update')->name('demande.update');
//Route::put('/Demandes Analyse/delete/{test}', 'DemandeAnalyseController@destroy')->name('demande.destroy');

/* Echantillon Analyser Controller */
Route::get('/Echantillon Analyse', 'EchantillonAnalyseController@index')->name('echantillon.index');
Route::post('/Echantillon Analyse/store', 'EchantillonAnalyseController@store');
Route::get('/Echantillon Analyse/edit/{echant_now}', 'EchantillonAnalyseController@edit')->name('echantillon.edit');
Route::post('/Echantillon Analyse/update/{echant_now}', 'EchantillonAnalyseController@update')->name('echantillon.update');
Route::get('/Echantillon Analyse/complete/{echant_now}', 'EchantillonAnalyseController@complete')->name('echantillon.complete');

// Dashboard Routing
Route::get('/Dashboard', 'DashboardController@index')->name('dashboard.index');


//Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

//Auth::routes();
//Route::post('/login-now', [App\Http\Controllers\Auth\NewLoginController::class, 'authenticate'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'register'])->name('logout');


// Users Routing

Route::get('/Utilisateurs', 'UserController@index')->name('users.index');
Route::get('/Utilisateurs/create', 'UserController@create')->name('users.create');

// Patient Routing

Route::get('/Historique', 'PatientController@index')->name('patients.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
