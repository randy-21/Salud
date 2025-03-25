<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        // Encuentra el usuario específico
        $user = User::findOrFail($request->id);

        // Obtén todos los roles
        $roles = Role::all();

        // Obtén los IDs de los roles asignados al usuario
        $assignedRoles = $user->roles->pluck('id')->toArray();

        return view('user.UserRoleCheck', compact('user', 'roles', 'assignedRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        ini_set('memory_limit', '512M'); // O el valor que necesites
        // Encuentra el usuario
        $user = User::findOrFail($request->id);

        // Obtén la lista de roles seleccionados (puede ser null si no se seleccionó nada)
        $roles = $request->input('roleList', []);

        // Sincroniza los roles del usuario
        return $user->syncRoles($roles);
        //return $roles;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
