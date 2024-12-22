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


        //permisos
        //  Permission::create(['name' => 'clientes']);
        //  Permission::create(['name' => 'usuarios']);
        //  Permission::create(['name' => 'blogs']);
        //  Permission::create(['name' => 'proyectos']);
        //  Permission::create(['name' => 'imagenes']);


        Permission::create(['name' => 'asistir']);
        $role3 = Role::create(['name' => 'Asistencial']);
        $role3->syncPermissions("asistir");
        Permission::create(['name' => 'invitado']);
        $role4 = Role::create(['name' => 'Invitado']);
        $role4->syncPermissions("invitado");

        Permission::create(['name' => 'agregar']);
        Permission::create(['name' => 'editar']);
        Permission::create(['name' => 'actualizar']);
        Permission::create(['name' => 'eliminar']);

        Permission::create(['name' => 'administrar']);
        $role = Role::create(['name' => 'Administrador']);
        $role->syncPermissions("administrar");

    

      
        // create user
        $user1 = User::create([
            'dni' => '44444444',
            'firstname' => 'Cardenas',
            'lastname' => 'Aquino',
            'names' => 'Anthony Robert',
            'password' => Hash::make('12345678'),
            'datebirth' => '2000-10-10',
            'cellphone' => '999999999',
            'sex' => 'M',
            'email' => 'admin@gmail.com',
        ]);
        //asignar rol
        $user1->assignRole('Administrador');
        ///////////////////////////////////////////////////////////////////////
        $user2 = User::create([
            'dni' => '44444444',
            'firstname' => 'Cardenas1',
            'lastname' => 'Aquino1',
            'names' => 'Anthony Robert1',
            'password' => Hash::make('12345678'),
            'datebirth' => '2000-10-10',
            'cellphone' => '999999999',
            'sex' => 'M',
            'email' => 'admin1@gmail.com',
        ]);
        $user2->assignRole('Asistencial');
    }
}
