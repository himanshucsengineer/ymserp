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
        $inwardExecutive = "INWARD_EXECUTIVE";
        $maintaininace = "MAINTENANCE";
        $preadvice = "PRE_ADVICE";
        $outward = "OUTWARD_EXECUTIVE";
        $purchase = "PURCHASES";
        $supervisor = "SUPERVISOR";

        $do_manager = "DO_MANAGER";
        $PTI = "PTI";
        $bank = "BANK";
        $cash_flow = "CASH_FLOW";
        $report = "REPORT";




        //Create driver Permissions
        Permission::create(['name'=>$SECURITY]);
        Permission::create(['name'=>$SURVEYOR]);
        Permission::create(['name'=>$inwardExecutive]);
        Permission::create(['name'=>$supervisor]);
        Permission::create(['name'=>$maintaininace]);
        Permission::create(['name'=>$preadvice]);
        Permission::create(['name'=>$outward]);
        Permission::create(['name'=>$BILLING]);
        Permission::create(['name'=>$STORES]);
        Permission::create(['name'=>$purchase]);
        Permission::create(['name'=>$MANAGEMENT]);
        Permission::create(['name' => $MASTERS]);
        Permission::create(['name' => $do_manager]);
        Permission::create(['name' => $PTI]);
        Permission::create(['name' => $cash_flow]);
        Permission::create(['name' => $report]);

        //roles Available
        $superAdmin = 'super-admin';

        Role::create(['name'=> $superAdmin])->givePermissionTo(Permission::all());

    }
}