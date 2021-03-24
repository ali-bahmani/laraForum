<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $superAdminUser = User::where('email',config('permission.default_super_admin'));
        // $superAdminUser->assignRole('Super Admin');


        $roleInDatabase = Role::where('name','permission.default_roles'[0]);
        if($roleInDatabase){
            foreach(config('permission.default_roles') as $role){
                Role::create([
                    'name' => $role
                ]);
            }
        }
        
        $permissionInDatabase = Permission::where('name','permission.default_roles'[0]);
        if($permissionInDatabase){
            foreach(config('permission.default_permission') as $permission){
                Permission::create([
                    'name' => $permission
                ]);
            }
        }



    }
}
