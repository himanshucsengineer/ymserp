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


        $createContractor = "CREATE_CONTRACTOR";
        $viewContractor = "VIEW_CONTRACTOR";
        $updateContractor = "UPDATE_CONTRACTOR";
        $deleteContractor = "DELETE_CONTRACTOR";


        $createCategory = "CREATE_CATEGORY";
        $viewCategory= "VIEW_CATEGORY";
        $updateCategory = "UPDATE_CATEGORY";
        $deleteCategory = "DELETE_CATEGORY";

        $createDepo = "CREATE_DEPO";
        $viewDepo = "VIEW_DEPO";
        $updateDepo = "UPDATE_DEPO";
        $deleteDepo = "DELETE_DEPO";

        $createEmployee = "CREATE_EMPLOYEE";
        $viewEmployee = "VIEW_EMPLOYEE";
        $updateEmployee = "UPDATE_EMPLOYEE";
        $deleteEmployee = "DELETE_EMPLOYEE";

        $createUser = "CREATE_USER";
        $viewUser = "VIEW_USER";
        $updateUser = "UPDATE_USER";
        $deleteUser = "DELETE_USER";

        $createDamage = "CREATE_DAMAGE";
        $viewDamage = "VIEW_DAMAGE";
        $updateDamage = "UPDATE_DAMAGE";
        $deleteDamage = "DELETE_DAMAGE";

        $createRepair = "CREATE_REPAIR";
        $viewRepair = "VIEW_REPAIR";
        $updateRepair = "UPDATE_REPAIR";
        $deleteRepair = "DELETE_REPAIR";

        $createMaterial = "CREATE_MATERIAL";
        $viewMaterial = "VIEW_MATERIAL";
        $updateMaterial = "UPDATE_MATERIAL";
        $deleteMaterial = "DELETE_MATERIAL";

        $createLine = "CREATE_LINE";
        $viewLine = "VIEW_LINE";
        $updateLine = "UPDATE_LINE";
        $deleteLine = "DELETE_LINE";

        $createTarrif = "CREATE_TARRIF";
        $viewTarrif = "VIEW_TARRIF";
        $updateTarrif = "UPDATE_TARRIF";
        $deleteTarrif = "DELETE_TARRIF";

        $createTransport = "CREATE_TRANSPORT";
        $viewTransport = "VIEW_TRANSPORT";
        $updateTransport = "UPDATE_TRANSPORT";
        $deleteTransport = "DELETE_TRANSPORT";

        $gateIn = "GATE_IN";
        $gateOut = "GATE_OUT";
        $inspection = "INSPECTION";
        

        $createRole = "CREATE_ROLE";
        $viewRole = "VIEW_ROLE";
        $updateRole = "UPDATE_ROLE";
        $deleteRole = "DELETE_ROLE";

        //Create driver Permissions
        Permission::create(['name'=>$createContractor]);
        Permission::create(['name'=>$viewContractor]);
        Permission::create(['name'=>$updateContractor]);
        Permission::create(['name'=>$deleteContractor]);

        Permission::create(['name'=>$createCategory]);
        Permission::create(['name'=>$viewCategory]);
        Permission::create(['name'=>$updateCategory]);
        Permission::create(['name'=>$deleteCategory]);

        Permission::create(['name'=>$createDepo]);
        Permission::create(['name'=>$viewDepo]);
        Permission::create(['name'=>$updateDepo]);
        Permission::create(['name'=>$deleteDepo]);



        Permission::create(['name'=>$createEmployee]);
        Permission::create(['name'=>$viewEmployee]);
        Permission::create(['name'=>$updateEmployee]);
        Permission::create(['name'=>$deleteEmployee]);

        Permission::create(['name'=>$createUser]);
        Permission::create(['name'=>$viewUser]);
        Permission::create(['name'=>$updateUser]);
        Permission::create(['name'=>$deleteUser]);


        Permission::create(['name'=>$createDamage]);
        Permission::create(['name'=>$viewDamage]);
        Permission::create(['name'=>$updateDamage]);
        Permission::create(['name'=>$deleteDamage]);

        Permission::create(['name'=>$createRepair]);
        Permission::create(['name'=>$viewRepair]);
        Permission::create(['name'=>$updateRepair]);
        Permission::create(['name'=>$deleteRepair]);


        Permission::create(['name'=>$createMaterial]);
        Permission::create(['name'=>$viewMaterial]);
        Permission::create(['name'=>$updateMaterial]);
        Permission::create(['name'=>$deleteMaterial]);

        Permission::create(['name'=>$createLine]);
        Permission::create(['name'=>$viewLine]);
        Permission::create(['name'=>$updateLine]);
        Permission::create(['name'=>$deleteLine]);



        Permission::create(['name'=>$createTarrif]);
        Permission::create(['name'=>$viewTarrif]);
        Permission::create(['name'=>$updateTarrif]);
        Permission::create(['name'=>$deleteTarrif]);

        Permission::create(['name'=>$createTransport]);
        Permission::create(['name'=>$viewTransport]);
        Permission::create(['name'=>$updateTransport]);
        Permission::create(['name'=>$deleteTransport]);


        Permission::create(['name'=>$createRole]);
        Permission::create(['name'=>$viewRole]);
        Permission::create(['name'=>$updateRole]);
        Permission::create(['name'=>$deleteRole]);


        Permission::create(['name'=>$gateIn]);
        Permission::create(['name'=>$gateOut]);
        Permission::create(['name'=>$inspection]);

        //roles Available
        $superAdmin = 'super-admin';

        Role::create(['name'=> $superAdmin])->givePermissionTo(Permission::all());

    }
}