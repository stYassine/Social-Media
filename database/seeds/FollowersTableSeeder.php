<?php

use Illuminate\Database\Seeder;

use App\Followers;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $follower_1 =Followers::create([
            'user_id' => 1,
            'follower_id' => 2
        ]);
        $follower_2 =Followers::create([
            'user_id' => 1,
            'follower_id' => 3
        ]);
        $follower_3 =Followers::create([
            'user_id' => 1,
            'follower_id' => 4
        ]);
        $follower_4 =Followers::create([
            'user_id' => 1,
            'follower_id' => 5
        ]);
        
        
        $follower_5 =Followers::create([
            'user_id' => 2,
            'follower_id' => 4
        ]);
        $follower_6 =Followers::create([
            'user_id' => 2,
            'follower_id' => 5
        ]);
        
        
    }
}
