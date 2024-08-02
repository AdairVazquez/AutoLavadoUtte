<?php

use App\Http\Controllers\etapasController;
use App\Http\Controllers\Servicios_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/nueva', function () {
    return view('create_servicio');
});

// rutas servicios 
Route::get('/servicio/nueva',[Servicios_controller::class,'view'])->name('servicio.nueva');

Route::delete('servicio/eliminar/{id}',[Servicios_controller::class,'delete'])->name('servicio.eliminar');

Route::post('/servicio/guardar',[Servicios_controller::class,'store'])->name('servicio.guardar');

Route::get('/servicios',[Servicios_controller::class,'index'])->name('servicios');

//rutas etapas

Route::post('/etapa/nueva',[etapasController::class,'store'])->name('etapa.guardar');

Route::delete('etapa/eliminar/{id}',[etapasController::class,'delete'])->name('etapa.eliminar');

Route::post('/servicio/guardar',[Servicios_controller::class,'store'])->name('servicio.guardar');

Route::get('/etapas/editar',[etapasController::class,'etapaSola'])->name('etapa.editar');

Route::get('/etapas/editarG',[etapasController::class,'edit'])->name('etapa.editarG');

Route::get('/servicios',[Servicios_controller::class,'index'])->name('servicios');


//1012210