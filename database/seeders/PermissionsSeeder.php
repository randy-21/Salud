<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;
//agregar hash // SIRVE PARA ENCRIPTAR UAN CLAVE
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

                // INSERT INTO A LA TABLA PERMISOS
                Permission::create(['name' => 'administrar']);
                //INSERT INTO A LA TABLA ROLES
                $role = Role::create(['name' => 'admin']);

                $role->syncPermissions("administrar");
                // create user
                $user1 = User::create([
                    'name' => 'Anthony Robert',
                    'password' => Hash::make('123456'),

                    'email' => 'logicainformatica18@gmail.com',
                ]);
                //asignar rol
                $user1->assignRole('admin');
                /////////////////////////////////////////////////////////////////////
                Permission::create(['name' => 'digitar']);
                $role2 = Role::create(['name' => 'Digitador']);
                $role2->syncPermissions("digitar");
                // create user
                $user2 = User::create([
                    'name' => 'roberto',
                    'password' => Hash::make('123456'),
                    'email' => 'estudiante18@gmail.com',
                ]);
                  //asignar rol
                $user2->assignRole('Digitador');






                Permission::create(['name' => 'asistir']);
                $role3 = Role::create(['name' => 'Asistencial']);
                $role3->syncPermissions("asistir");
                Permission::create(['name' => 'invitado']);
                $role4 = Role::create(['name' => 'Invitado']);
                $role4->syncPermissions("invitado");




    }
}
