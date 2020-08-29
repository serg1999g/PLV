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
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'delete posts']);

        //create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit posts');
        $role1->givePermissionTo('create posts');
        $role1->givePermissionTo('delete posts');

        $role2 = Role::create(['name' => 'admin']);

        // create admin user
        $adminData = ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin123')];

        $admin = User::create($adminData);
        $admin->assignRole($role2);


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
    }
}
