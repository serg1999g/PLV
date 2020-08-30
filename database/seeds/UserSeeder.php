<?php

use App\Modules\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions
        Permission::create(['name' => 'edit own posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'delete own posts']);

        Permission::create(['name'=>'edit all posts']);
        Permission::create(['name'=>'delete any post']);

        //create roles and assign existing permissions

        // writer role
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit own posts');
        $role1->givePermissionTo('create posts');
        $role1->givePermissionTo('delete own posts');

        // create writer users
        $users = [
            ['name' => 'test01', 'email' => 'test01@gmail.com', 'password' => Hash::make('testtest')],
            ['name' => 'test02', 'email' => 'test02@gmail.com', 'password' => Hash::make('testtest')],
            ['name' => 'test03', 'email' => 'test03@gmail.com', 'password' => Hash::make('testtest')],
            ['name' => 'test04', 'email' => 'test04@gmail.com', 'password' => Hash::make('testtest')],
            ['name' => 'test05', 'email' => 'test05@gmail.com', 'password' => Hash::make('testtest')],
        ];

        foreach ($users as $user) {
            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password']
            ]);
            $newUser->assignRole($role1);
        }

        // redactor role
        $role2 = Role::create(['name'=>'redactor']);
        $role2->givePermissionTo(['create posts']);
        $role2->givePermissionTo(['edit all posts']);
        $role2->givePermissionTo(['delete any post']);

        // create redactor user
        $redactorData = ['name' => 'redactor', 'email' => 'redactor@gmail.com', 'password' => Hash::make('redactor123')];
        $redactor = User::create($redactorData);
        $redactor->assignRole($role2);

        // admin role
        $role3 = Role::create(['name' => 'admin']);

        // create admin user
        $adminData = ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin123')];
        $admin = User::create($adminData);
        $admin->assignRole($role3);
    }
}
