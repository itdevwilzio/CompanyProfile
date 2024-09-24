<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage abouts',
            'manage appointments',
            'manage hero sections',
        ];

        // Create permissions if they don't exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $roles = [
            'design_manager' => [
                'manage products',
                'manage principles',
                'manage testimonials',
            ],
            'super_admin' => Permission::all()->pluck('name')->toArray(), // Assign all permissions to super_admin
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

        // Create users and assign roles
        $users = [
            'super_admin' => [
                'email' => 'super_admin@example.com',
                'role' => 'super_admin',
            ],
            'design_manager' => [
                'email' => 'design_manager@example.com',
                'role' => 'design_manager',
            ],
            'product_manager' => [
                'email' => 'product_manager@example.com',
                'role' => 'design_manager', // Assigning design_manager role, adjust if needed
            ],
        ];

        foreach ($users as $userName => $userData) {
            $user = User::firstOrCreate([
                'email' => $userData['email'],
            ], [
                'name' => $userName,
                'password' => Hash::make('password'), // Use hashed password
                'email_verified_at' => now(),
            ]);

            // Assign role to user
            $user->assignRole($userData['role']);
        }
    }
}
