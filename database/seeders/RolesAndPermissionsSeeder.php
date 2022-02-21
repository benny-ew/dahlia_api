<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Constants\Guard;


class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'retrieve.user','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.users','guard_name'=>'api']);
        Permission::create(['name' => 'create.user','guard_name'=>'api']);
        Permission::create(['name' => 'update.user','guard_name'=>'api']);
        Permission::create(['name' => 'delete.user','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.account','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.accounts','guard_name'=>'api']);
        Permission::create(['name' => 'create.account','guard_name'=>'api']);
        Permission::create(['name' => 'update.account','guard_name'=>'api']);
        Permission::create(['name' => 'delete.account','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.company','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.companies','guard_name'=>'api']);
        Permission::create(['name' => 'create.company','guard_name'=>'api']);
        Permission::create(['name' => 'update.company','guard_name'=>'api']);
        Permission::create(['name' => 'delete.company','guard_name'=>'api']);
        Permission::create(['name' => 'save.company.image','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.employee','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.employees','guard_name'=>'api']);
        Permission::create(['name' => 'create.employee','guard_name'=>'api']);
        Permission::create(['name' => 'update.employee','guard_name'=>'api']);
        Permission::create(['name' => 'delete.employee','guard_name'=>'api']);

        Permission::create(['name' => 'retrieve.entity','guard_name'=>'api']);
        Permission::create(['name' => 'retrieve.all.entities','guard_name'=>'api']);
        Permission::create(['name' => 'create.entity','guard_name'=>'api']);
        Permission::create(['name' => 'update.entity','guard_name'=>'api']);
        Permission::create(['name' => 'delete.entity','guard_name'=>'api']);

        Permission::create(['name' => 'dashboard','guard_name'=>'api']);
        
        // create roles and assign created permissions

        //admin
        $role = Role::create(['name' => 'admin','guard_name'=>'api']);

        $role->givePermissionTo('dashboard');
        
        $role->givePermissionTo('retrieve.all.users');
        $role->givePermissionTo('retrieve.user');
        $role->givePermissionTo('create.user');
        $role->givePermissionTo('update.user');
        $role->givePermissionTo('delete.user');
             
        $role->givePermissionTo('retrieve.all.companies');
        $role->givePermissionTo('retrieve.company');
        $role->givePermissionTo('create.company');
        $role->givePermissionTo('update.company');
        $role->givePermissionTo('delete.company');
        $role->givePermissionTo('save.company.image');
        
        $role->givePermissionTo('retrieve.all.employees');
        $role->givePermissionTo('retrieve.employee');
        $role->givePermissionTo('create.employee');
        $role->givePermissionTo('update.employee');
        $role->givePermissionTo('delete.employee');

        $role->givePermissionTo('retrieve.all.entities');
        $role->givePermissionTo('retrieve.entity');
        $role->givePermissionTo('create.entity');
        $role->givePermissionTo('update.entity');
        $role->givePermissionTo('delete.entity');


        //operator
        $role = Role::create(['name' => 'operator','guard_name'=>'api']);

        $role->givePermissionTo('dashboard');

        $role->givePermissionTo('retrieve.all.companies');
        $role->givePermissionTo('retrieve.company');
        $role->givePermissionTo('create.company');
        $role->givePermissionTo('update.company');
        $role->givePermissionTo('delete.company');

        $role->givePermissionTo('retrieve.all.employees');
        $role->givePermissionTo('retrieve.employee');


        // $role->syncPermissions();
        
        $role = Role::create(['name' => 'client_operator','guard_name'=>'api']);
        $role->givePermissionTo('dashboard');

        $role->givePermissionTo('retrieve.all.employees');
        $role->givePermissionTo('retrieve.employee');

        $role->givePermissionTo('retrieve.company');
        $role->givePermissionTo('save.company.image');

        // $role->syncPermissions();
        
        $role = Role::create(['name' => 'client_executive','guard_name'=>'api']);
        $role->givePermissionTo('dashboard');

        $role->givePermissionTo('retrieve.all.employees');
        $role->givePermissionTo('retrieve.employee');

        $role->givePermissionTo('retrieve.company');

        // $role->syncPermissions();
        

    }
}