<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Operator'],
        ];
        $permissions = [
            ['permission_id' => 1],
            ['permission_id' => 2],
            ['permission_id' => 3],
            ['permission_id' => 4],
            ['permission_id' => 5],
            ['permission_id' => 6],
            ['permission_id' => 7],
            ['permission_id' => 8],

        ];
        foreach ($roles as $role) {
            $role = Role::create($role);
            if ($role->id == 1) {
                $role->rolePermissions()->sync($permissions);
            }
            if ($role->id == 2) {
                $operatorPermissions = array_slice($permissions, 0, 2);
                $role->rolePermissions()->sync($operatorPermissions);
            }
        }
    }
}