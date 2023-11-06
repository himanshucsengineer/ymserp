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



        


        $MASTERS = "MASTERS";
        $MANAGEMENT = "MANAGEMENT";
        $DEPOS = "DEPOS";
        $STORES = "STORES";


        $BILLING = "BILLING";
        $SURVEYOR = "SURVEYOR";
        $SECURITY = "SECURITY";
        $DASHBOARD = "DASHBOARD";

        //Create driver Permissions
        Permission::create(['name'=>$MASTERS]);
        Permission::create(['name'=>$MANAGEMENT]);
        Permission::create(['name'=>$DEPOS]);
        Permission::create(['name'=>$STORES]);

        Permission::create(['name'=>$BILLING]);
        Permission::create(['name'=>$SURVEYOR]);
        Permission::create(['name'=>$SECURITY]);
        Permission::create(['name'=>$DASHBOARD]);

        //roles Available
        $superAdmin = 'super-admin';

        Role::create(['name'=> $superAdmin])->givePermissionTo(Permission::all());

    }
}