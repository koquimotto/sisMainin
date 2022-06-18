<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Livewire\Configuracion\Usuarios\Usuarios;
use App\Http\Livewire\Almacenes\Almacenes;

//Sesion
Route::get('/login',[SessionsController::class, 'login'])->name('login')->middleware('guest');
Route::post('login/create',[SessionsController::class, 'create'])->name('login.create');
Route::get('login/destroy',[SessionsController::class,'destroy'])->name('login.destroy')->middleware('auth');

//Inicio
Route::get('/',[HomeController::class,'home'])->name('home')->middleware('auth');
Route::get('/modulos',[HomeController::class,'modules'])->name('modules')->middleware('auth'); 

/************************************************ Módulos **********************************************************/

// Configuración
Route::get('configuracion/usuarios',Usuarios::class)->name('configuracion.usuarios')->middleware('auth');
Route::get('/registrar',[RegisterController::class, 'create'])->name('register');
Route::post('registrar/create',[RegisterController::class,'store'])->name('register.store');

// Dashboard
Route::get('almacen/almacenes',Almacenes::class)->name('almacen.almacenes')->middleware('auth');
/********************************************** Fin Módulos *********************************************************/ 
