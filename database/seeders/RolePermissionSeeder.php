<?php

namespace Database\Seeders;


use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
        [
            'group_name' => 'dashboard',
            'permissions' => [
                'dashboard.view',
            ]
        ],
        [
            'group_name' => 'user',
            'permissions' => [
                'user.create',
                'user.view',
                'user.edit',
                'user.delete',
                'user.approve',
            ]
        ],
        [
            'group_name' => 'role',
            'permissions' => [
                'role.create',
                'role.view',
                'role.edit',
                'role.delete',
                'role.approve',
            ]
        ],
        [
            'group_name' => 'profile',
            'permissions' => [
                'profile.view',
                'profile.edit',
            ]
        ],
        [
            'group_name' => 'page',
            'permissions' => [
                'page.create',
                'page.view',
                'page.edit',
                'page.delete',
            ]
        ],
        [
            'group_name' => 'student',
            'permissions' => [
                'student.create',
                'student.view',
                'student.edit',
                'student.delete',
                'student.approve',
            ]
        ]

    ];

    $roleSuperAdmin = Role::create(['name' => 'super-admin']);
    $member = Role::create(['name' => 'member']);

    foreach ($permissions as $permission) {
        foreach ($permission['permissions'] as $perm) {
            Permission::create(['name' => $perm, 'group_name' => $permission['group_name']]);
            $roleSuperAdmin->givePermissionTo($perm);
        }
    }

    $user = User::where('email', 'sohel@sohel.com')->first();
    $user->assignRole('super-admin');
}
};
