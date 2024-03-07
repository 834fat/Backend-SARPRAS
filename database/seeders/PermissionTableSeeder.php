<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    protected $permissionsAdmin = [
        'users.index',
        'users.create',
        'users.edit',
        'users.delete',
        'permission.index',
        'roles.index',
        'roles.create',
        'roles.edit',
        'roles.delete',
        'DataBarang.index',
        'DataBarang.create',
        'DataBarang.edit',
        'DataBarang.delete',
        'DataRuangan.index',
        'DataRuangan.create',
        'DataRuangan.edit',
        'DataRuangan.delete'
    ];

    protected $permissionsUser = [
        
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => 'users.index', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'users.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'users.edit', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'users.delete', 'guard_name' => 'api']);

        Permission::firstOrCreate(['name' => 'permission.index', 'guard_name' => 'api']); 

        Permission::firstOrCreate(['name' => 'roles.index', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'roles.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'roles.edit', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'roles.delete', 'guard_name' => 'api']);

        Permission::firstOrCreate(['name' => 'DataBarang.index', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'DataBarang.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'DataBarang.edit', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'DataBarang.delete', 'guard_name' => 'api']);

        Permission::firstOrCreate(['name' => 'DataRuangan.index', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'DataRuangan.create', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'DataRuangan.edit', 'guard_name' => 'api']);
        Permission::firstOrCreate(['name' => 'DataRuangan.delete', 'guard_name' => 'api']);
    }
}
