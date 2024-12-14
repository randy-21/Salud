<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("usuarios");
});
Route::get('maestro', function () {
  return view('user.user');
});
Route::get('/inicio', function () {
  return view('template');
});

Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('envio/{id}', [App\Http\Controllers\UserController::class, 'store']);
// Route::get('randy', function () {
//   return "hola randy";
// });
// Route::get('hola', function () {
//     return view('saludo');
// });


use App\Http\Controllers\SaludosController ;

Route::get('/saludo_controlador', [SaludosController::class, 'index']);

Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index']);
Route::post('userStore', [App\Http\Controllers\UserController::class, 'store']);
Route::get('userDestroy/{id}', [App\Http\Controllers\UserController::class, 'destroy']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

