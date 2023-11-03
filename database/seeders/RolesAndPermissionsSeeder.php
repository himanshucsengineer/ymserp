<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $createDriver = "CREATE_DRIVER";
        $viewDriver = "VIEW_DRIVER";
        $updateDriver = "UPDATE_DRIVER";
        $deleteDriver = "DELETE_DRIVER";

        //Create driver Permissions
        Permission::create(['name'=>$createDriver]);
        Permission::create(['name'=>$viewDriver]);
        Permission::create(['name'=>$updateDriver]);
        Permission::create(['name'=>$deleteDriver]);

        //roles Available
        $superAdmin = 'super-admin';

        Role::create(['name'=> $superAdmin])->givePermissionTo(Permission::all());

    }
}