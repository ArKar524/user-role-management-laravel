<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            ['name' => 'Create', 'feature_id' => 1],
            ['name' => 'Read', 'feature_id' => 1],
            ['name' => 'Update', 'feature_id' => 1],
            ['name' => 'Delete', 'feature_id' => 1],
            ['name' => 'Create', 'feature_id' => 2],
            ['name' => 'Read', 'feature_id' => 2],
            ['name' => 'Update', 'feature_id' => 2],
            ['name' => 'Delete', 'feature_id' => 2],
            ['name' => 'Create', 'feature_id' => 3],
            ['name' => 'Read', 'feature_id' => 3],
            ['name' => 'Update', 'feature_id' => 3],
            ['name' => 'Delete', 'feature_id' => 3],
        ];

        foreach ($features as $feature) {
            Permission::create($feature);
        }
    }
}