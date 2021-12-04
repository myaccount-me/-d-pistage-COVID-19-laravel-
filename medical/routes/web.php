<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\laboController;
use App\Http\Controllers\rdvController;
use App\Http\Controllers\documentController;



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
Route::get('/sendmail', function () {  return view('sendmail');});


Route::get('/connect', function () {  return view('connect');})->name('cnx');
Route::get('/reserver', function () {  return view('reserver');})->name('reserver');

Route::get('/inscrire', function () {return view('inscrire');})->name('inscrire');

Route::get('/', function () {  return view('index');})->name('index');






Route::get('profil', function () {  return view('monprofil');})->name('profil');
Route::get('labo', [laboController::class,'create'])->name('labo');


Route::get('rdv', [rdvController::class,'create'])->name('rdv');
Route::get('docs', [documentController::class,'create'])->name('docs');
Route::get('delete/{id}', [rdvController::class,'destroy'])->name('delete');
Route::get('edit{labo_id}-{id}', [rdvController::class,'edit']);
Route::get('deplacer{id}-{i}-{date}', [rdvController::class,'update']);



Route::post('addPatient',[PatientController::class,'store']);
Route::post('updateP',[PatientController::class,'update']);
Route::get('activer',[PatientController::class,'activer']);
Route::get('reserver{id}-{i}-{date}', [rdvController::class,'index']);

Route::get('horraire{id}', [laboController::class,'index']);

Route::post('addreservation',[rdvController::class,'store']);
Route::post('Home',[PatientController::class,'login']);
Route::get('logout',[PatientController::class,'logout']);
Route::get('desactiver',[PatientController::class,'desactiver']);
//Route::get('/',[PatientController::class,'protect'])->name('index');
