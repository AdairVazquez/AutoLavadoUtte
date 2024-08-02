<?php

use App\Http\Controllers\AutoController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Servicios_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user',function (Request $request)
{
    return $request -> user();
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login',[LoginController::class, 'login']);


Route::post('/servicio/guardar', [Servicios_controller::class, 'crear']);
Route::get('/servicios', [Servicios_controller::class, 'ver']);
Route::post('/servicio', [Servicios_controller::class, 'show']);
Route::post('/servicio/eliminar', [Servicios_controller::class, 'eliminar']);

Route::post('/servicioI', [Servicios_controller::class, 'showI']);


//Api etapas
Route::post('/etapa/guardar', [EtapaController::class, 'crear']);
Route::get('/etapas', [EtapaController::class, 'ver']);
Route::post('/etapa', [EtapaController::class, 'show']);
Route::post('/etapa/eliminar', [EtapaController::class, 'eliminar']);
Route::post('/etapa/sola', [EtapaController::class, 'etapasA']);


//Api autos

Route::post('/autos/editar', [AutoController::class, 'act']);
Route::get('/autos', [AutoController::class, 'ver']);
Route::post('/auto', [AutoController::class, 'show']);
Route::delete('/auto/eliminar/{id}', [AutoController::class, 'eliminar']); 

//API citas
Route::post('/cita', [CitasController::class, 'showCita']);
Route::post('/cita/eliminar', [CitasController::class, 'deleteCita']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auto/guardar', [AutoController::class, 'crear']);
    Route::get('/autosCliente',[AutoController::class, 'showAutoCliente']);
    Route::post('/cita/guardar',[CitasController::class, 'crear']);
    Route::get('/citas',[CitasController::class, 'showCitas']);
});