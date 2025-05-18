<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeders extends Seeder
{
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $SD = Role::firstOrCreate(['name' => 'SD']);
        $SMP = Role::firstOrCreate(['name' => 'SMP']);
        $SMA = Role::firstOrCreate(['name' => 'SMA']);

        // BELUM FIX PERMISSIONNYA
        // $permission_levels = [
        //     'fresh_user',
        //     'access_level_B_unpaid',
        //     'access_level_C_unpaid',
        //     'level_a_pending_payment',
        //     'level_b_pending_payment',
        //     'level_c_pending_payment',
        //     'access_level_A',
        //     'access_level_B',
        //     'access_level_C',
        //     'bundling',
        //     'EXPIRED_LEVEL',
        // ];

        // foreach($permission_levels as $permission) {
        //     Permission::firstOrCreate([
        //         'name' => $permission,
        //         'guard_name' => 'web'
        //     ]);
        // }

        // KATEGORI LEVEL A, BELUM FIX JUGA
        // $permission_kategories = [
        //     'HOTS',
        //     'PCK',
        //     'NUMERASI',
        //     'LITERASI',
        //     'EXPIRED_KATEGORY'
        // ];

        // foreach($permission_kategories as $permission_k) {
        //     Permission::firstOrCreate([
        //         'name' => $permission_k,
        //         'guard_name' => 'web'
        //     ]);
        // }
    }
}
