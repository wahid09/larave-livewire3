<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'role_id' => Role::where('slug', 'super-admin')->first()->id,
            'username' => 'superadmin',
            'full_name' => 'Super',
            'ba_no' => 'ba-123',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'status' => true
        ]);

        User::updateOrCreate([
            'role_id' => Role::where('slug', 'staff')->first()->id,
            'username' => 'user',
            'full_name' => 'User',
            'ba_no' => 'ba-1234',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            'status' => true
        ]);
    }
}