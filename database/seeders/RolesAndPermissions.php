<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Crear permisos
            $role = Role::create(['name' => 'writer']);
            $permission = Permission::create(['name' => 'edit articles']);

            // Crear roles y asignar permisos
           $role->givePermissionTo($permission);
           $permission->assignRole($role);
    }
}
