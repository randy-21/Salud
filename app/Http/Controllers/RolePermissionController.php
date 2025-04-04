<?php

namespace App\Http\Controllers;

use App\Models\Role_permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role_permission  $role_permission
     * @return \Illuminate\Http\Response
     */
    public function show(Role_permission $role_permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role_permission  $role_permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        $Role = Role::findOrFail($request->id);
        // Obtén todos los permisos
        $permissions = Permission::all();
        // Obtén los IDs de los permisos asignados al rol
        $assignedPermissions = $Role->permissions->pluck('id')->toArray();
        return View("Role.RolePermissionCheck", compact("Role", "assignedPermissions", "permissions"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role_permission  $role_permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        // Encuentra el rol
        $Role = Role::findOrFail($request->id);
        // Obtén la lista de permisos seleccionados (puede ser null si no se seleccionó nada)
        $permissions = $request->input('permissionList', []);
        // Sincroniza los permisos del rol
        $Role->syncPermissions($permissions);

        //return 'Permisos actualizados correctamente.';
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role_permission  $role_permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role_permission $role_permission)
    {
        //
    }
}
