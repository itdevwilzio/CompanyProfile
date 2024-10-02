<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $this->createPermissions([
                'manage statistics', 'manage products', 'manage principles',
                'manage testimonials', 'manage clients', 'manage teams',
                'manage abouts', 'manage appointments', 'manage hero sections',
                'manage locations', 'manage voucher packages', 'manage payment methods'
            ]);

            $this->createRoleWithPermissions('design_manager', [
                'manage products', 'manage hero sections', 'manage testimonials'
            ]);

            $this->createRoleWithPermissions('operational_manager', [
                'manage teams'
            ]);

            $this->createRoleWithPermissions('super_admin', Permission::all()->pluck('name')->toArray());

            $this->createUserWithRole('super_admin', 'super@admin.com', 'password', 'super_admin');
            $this->createUserWithRole('design_manager', 'design.manager@example.com', 'design', 'design_manager');
            $this->createUserWithRole('operational_manager', 'operational.manager@example.com', 'operational', 'operational_manager');
        });
    }

    private function createPermissions(array $permissions)
    {
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }

    private function createRoleWithPermissions($roleName, $permissions)
    {
        $role = Role::firstOrCreate(['name' => $roleName]);
        $role->syncPermissions($permissions);
    }

    private function createUserWithRole($name, $email, $password, $roleName)
    {
        $user = User::firstOrCreate(['email' => $email], [
            'name' => $name,
            'password' => Hash::make(env('USER_PASSWORD', $password)),
            'email_verified_at' => now(),
        ]);
        
        if (!$user->hasRole($roleName)) {
            $user->assignRole($roleName);
        }
    }
}
