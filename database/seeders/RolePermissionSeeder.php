<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'create product',
            'edit product',
            'delete product',
            'create user',
            'edit user',
            'delete user',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission], // unique condition
                ['guard_name' => 'web'] // update Data
            );
        }

        $administrator = Role::updateOrCreate(
            ['name' => 'owner'],
            ['guard_name' => 'web']
        );
        $administrator->syncPermissions($permissions);

        $user = Role::updateOrCreate(
            ['name' => 'user'],
            ['guard_name' => 'web']
        );

        $user->syncPermissions(['create product']);

        $adminUser = User::updateOrCreate(
            ['email' => 'owner@pineapple.co.id'], //unique condition
            [
                'name' => 'Administrator',
                'password' => bcrypt('admin123'),
            ]
        );
        $adminUser->assignRole('owner');

        $user = User::updateOrCreate(
            ['email' => 'user@pineapple.co.id'], //unique condition
            [
                'name' => 'User',
                'password' => bcrypt('admin123'),
            ]
        );
        $user->assignRole('user');
    }
}
