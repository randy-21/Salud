<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("login");
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


Route::group(['middleware' => ['role:admin']], function () { 
  


  Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index']);
  Route::post('userStore', [App\Http\Controllers\UserController::class, 'store']);
  Route::post('userUpdate', [App\Http\Controllers\UserController::class, 'update']);
  Route::post('userEdit', [App\Http\Controllers\UserController::class, 'edit']);
  Route::get('userDestroy/{id}', [App\Http\Controllers\UserController::class, 'destroy']);


  Route::resource("roles", App\Http\Controllers\RoleController::class);
  Route::post('RoleStore', [App\Http\Controllers\RoleController::class, 'store']);
  Route::post('RoleEdit', [App\Http\Controllers\RoleController::class, 'edit']);
  Route::post('RoleUpdate', [App\Http\Controllers\RoleController::class, 'update']);
  Route::post('RoleDestroy', [App\Http\Controllers\RoleController::class, 'destroy']);
  Route::post('RoleShow', [App\Http\Controllers\RoleController::class, 'show']);

  Route::post('RolePermissionUpdate', [App\Http\Controllers\RolePermissionController::class, 'update']);
  Route::post('RolePermissionEdit', [App\Http\Controllers\RolePermissionController::class, 'edit']);

 });



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

