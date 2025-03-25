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


Route::group(['middleware' => ['auth']], function () {

  Route::get('perfil', [App\Http\Controllers\UserController::class, 'profile']);

  Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index'])->middleware('permission:administrar|usuarios');
  Route::post('userStore', [App\Http\Controllers\UserController::class, 'store'])->middleware('permission:administrar|agregar');
  Route::post('userUpdate', [App\Http\Controllers\UserController::class, 'update'])->middleware('permission:administrar|actualizar');
  Route::post('userEdit', [App\Http\Controllers\UserController::class, 'edit'])->middleware('permission:administrar|editar');
  Route::get('userDestroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->middleware('permission:administrar|eliminar');
  Route::post('userUpdateProfile', [App\Http\Controllers\UserController::class, 'updateProfile']);

  Route::post('UserRoleEdit', [App\Http\Controllers\UserRoleController::class, 'edit'])->middleware('permission:administrar|editar');
  Route::post('UserRoleUpdate', [App\Http\Controllers\UserRoleController::class, 'update'])->middleware('permission:administrar|actualizar');

  Route::get('registros', [App\Http\Controllers\RegistryController::class, 'index'])->middleware('permission:administrar|obstetra');
  Route::post('search', [App\Http\Controllers\RegistryController::class, 'search']);

  Route::post('registryStore', [App\Http\Controllers\RegistryController::class, 'store'])->middleware('permission:administrar|agregar');
  Route::post('registryUpdate', [App\Http\Controllers\RegistryController::class, 'update'])->middleware('permission:administrar|actualizar');
  Route::post('registryEdit', [App\Http\Controllers\RegistryController::class, 'edit'])->middleware('permission:administrar|editar');
  Route::get('registryDestroy/{id}', [App\Http\Controllers\RegistryController::class, 'destroy'])->middleware('permission:administrar|eliminar');
  Route::get('registry_export', [App\Http\Controllers\RegistryController::class, 'export'])->middleware('permission:administrar|obstetra');



  Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->middleware('permission:administrar|roles');
  Route::post('RoleStore', [App\Http\Controllers\RoleController::class, 'store'])->middleware('permission:administrar|agregar');
  Route::post('RoleEdit', [App\Http\Controllers\RoleController::class, 'edit'])->middleware('permission:administrar|editar');
  Route::post('RoleUpdate', [App\Http\Controllers\RoleController::class, 'update'])->middleware('permission:administrar|actualizar');
  Route::post('RoleDestroy', [App\Http\Controllers\RoleController::class, 'destroy'])->middleware('permission:administrar|eliminar');


  Route::post('RolePermissionUpdate', [App\Http\Controllers\RolePermissionController::class, 'update'])->middleware('permission:administrar|actualizar');
  Route::post('RolePermissionEdit', [App\Http\Controllers\RolePermissionController::class, 'edit'])->middleware('permission:administrar|editar');


  Route::resource("factor_riesgo", App\Http\Controllers\RiskFactorController::class);
  Route::post('riskFactorStore',[App\Http\Controllers\RiskFactorController::class, 'store']);
  Route::post('riskFactorEdit',[App\Http\Controllers\RiskFactorController::class, 'edit']);
  Route::post('riskFactorUpdate',[App\Http\Controllers\RiskFactorController::class, 'update']);
  Route::post('riskFactorDestroy',[App\Http\Controllers\RiskFactorController::class, 'destroy']);
  Route::post('riskFactorShow',[App\Http\Controllers\RiskFactorController::class, 'show']);

 });



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

