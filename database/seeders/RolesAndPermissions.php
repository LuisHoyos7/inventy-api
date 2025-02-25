<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creando roles
        $owner = Role::create(['name' => 'owner']);
        $cashier = Role::create(['name' => 'cashier']);

        Permission::create(['name' => 'view branches']);
        Permission::create(['name' => 'view products']);

    }
}
