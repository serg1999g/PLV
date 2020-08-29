<?php

use App\Modules\User\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name'=>'test01', 'email'=>'test01@gmail.com','password'=>'testtest'],
            ['name'=>'test02', 'email'=>'test02@gmail.com','password'=>'testtest'],
            ['name'=>'test03', 'email'=>'test03@gmail.com','password'=>'testtest'],
            ['name'=>'test04', 'email'=>'test04@gmail.com','password'=>'testtest'],
            ['name'=>'test05', 'email'=>'test05@gmail.com','password'=>'testtest'],
        ];

        foreach($users as $user) {
            User::create([
                'name'=>$user['name'],
                'email'=>$user['email'],
                'password'=>$user['password']
            ]);
        }
    }
}
