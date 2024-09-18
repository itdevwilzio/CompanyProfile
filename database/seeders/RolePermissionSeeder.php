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
            'manage locations',
            'manage voucher packages',
            'manage payment methods'
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create 'design_manager' role and assign permissions
        $designManagerRole = Role::firstOrCreate(['name' => 'design_manager']);
        $designManagePermissions = [
            'manage products',
            'manage principles',
            'manage testimonials',
        ];
        $designManagerRole->syncPermissions($designManagePermissions);

        // Create 'super_admin' role and assign all permissions
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdminRole->syncPermissions(Permission::all());

        // Create 'super_admin' user
        $user = User::create([
            'name' => 'super_admin',
            'email' => 'super_admin@example.com',
            'password' => Hash::make('password'), // Hash the password
            'email_verified_at' => now(),
        ]);

        // Assign 'super_admin' role to the user
        $user->assignRole($superAdminRole);
    }
}
