<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 =Role::create([
            'name' => 'Administrator'
        ]);
        $role2 =Role::create([
            'name' => 'Author'
        ]);
        $role3 =Role::create([
            'name' => 'Subscriber'
        ]);
        
    }
}
