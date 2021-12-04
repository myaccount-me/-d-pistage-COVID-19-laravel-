<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\documentController;
use App\Http\Controllers\compteController;
use App\Http\Controllers\rdvController;
use App\Http\Controllers\agendaController;
use App\Http\Controllers\laboratoireController;

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



Route::get('/', [compteController::class,'index']);
Route::get('/labo',[laboratoireController::class,'index']);
Route::get('/compte', function () {  return view('compte');});
Route::post('addcompte',[laboratoireController::class,'create']);
Route::post('editcompte',[laboratoireController::class,'edit']);
Route::get('edit{id}',[laboratoireController::class, 'update']);
Route::get('supp/{id}', [laboratoireController::class,'destroy']);

Route::get('del/{id}', [rdvController::class,'destroy']);
Route::get('confirmer/{id}', [rdvController::class,'confirmer']);

Route::get('rdv',  [rdvController::class,'create'])->name('rdv');

Route::get('/login', function () {  return view('login');});

Route::post('connect', [compteController::class,'login'])->name('connect');
Route::get('logout',[compteController::class,'logout']);

Route::get('/agenda', function () {  return view('agenda');});

Route::get('/listeAgd', [agendaController::class,'index'])->name('listeAgd');
Route::get('/docs', [documentController::class,'index'])->name('docs');
Route::post('addDocument',[documentController::class,'create']);
Route::get('destroy/{id}', [documentController::class,'destroy']);

Route::post('addAgenda',[agendaController::class,'create']);
Route::post('modifAgenda',[agendaController::class,'edit']);
Route::get('delete/{id}', [agendaController::class,'destroy']);

Route::get('modif-{id}',[agendaController::class, 'update']);
Route::get('liste',[documentController::class,'store']);
Route::get('modifier{id}',[documentController::class, 'update']);
Route::post('editDocument',[documentController::class,'edit']);
