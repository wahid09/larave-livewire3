<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = Permission::all();
        Role::updateOrCreate([
            'name' => 'Super Admin',
            'slug' => 'super-admin',
            'deletable' => false,
            'description' => 'super admin can do everything'
        ])->permissions()->sync($adminPermissions->pluck('id'));

        Role::updateOrCreate([
            'name' => 'Staff',
            'slug' => 'staff',
            'deletable' => false,
            'description' => 'Staff can not do anything'
        ]);
    }
}