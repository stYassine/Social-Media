<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user1 =User::create([
            'role_id' => 1,
            'is_active' => 1,
            'name' => 'Yassine',
            'email' => 'yassine_msiah@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        $user2 =User::create([
            'role_id' => 2,
            'is_active' => 1,
            'name' => 'Tim',
            'email' => 'tim_humble@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        $user3 =User::create([
            'role_id' => 2,
            'is_active' => 1,
            'name' => 'James',
            'email' => 'andy_james@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        $user4 =User::create([
            'role_id' => 3,
            'is_active' => 1,
            'name' => 'Eric_jones',
            'email' => 'eric_jones@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        $user5 =User::create([
            'role_id' => 3,
            'is_active' => 0,
            'name' => 'fred_doe',
            'email' => 'fred_doe@hotmail.com',
            'password' => bcrypt(123456)
        ]);
        
    }
}
