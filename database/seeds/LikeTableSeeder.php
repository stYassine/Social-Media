<?php

use Illuminate\Database\Seeder;

use App\Like;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $like_1 =Like::create([
            'user_id' => 1,
            'post_type_id' => 1,
            'post_id' => 1
        ]);
        $like_2 =Like::create([
            'user_id' => 2,
            'post_type_id' => 1,
            'post_id' => 1
        ]);
        $like_3 =Like::create([
            'user_id' => 3,
            'post_type_id' => 1,
            'post_id' => 1
        ]);
        $like_4 =Like::create([
            'user_id' => 1,
            'post_type_id' => 2,
            'post_id' => 1
        ]);
        $like_5 =Like::create([
            'user_id' => 1,
            'post_type_id' => 2,
            'post_id' => 1
        ]);
        
        
    }
}
