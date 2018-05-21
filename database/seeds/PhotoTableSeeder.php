<?php

use Illuminate\Database\Seeder;


use App\Photo;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $photo1 =Photo::create([
            'user_id' => 2,
            'category_id' => 3,
            'is_active' => 1,
            'title' => 'Learn Laravel',
            'path' => 'uploads/photos/1.png'
        ]);
        $photo2 =Photo::create([
            'user_id' => 2,
            'category_id' => 3,
            'is_active' => 1,
            'title' => 'Learn Laravel',
            'path' => 'uploads/photos/2.png'
        ]);
        $photo3 =Photo::create([
            'user_id' => 2,
            'category_id' => 3,
            'is_active' => 1,
            'title' => 'Learn Laravel',
            'path' => 'uploads/photos/3.png'
        ]);
        $photo4 =Photo::create([
            'user_id' => 3,
            'category_id' => 3,
            'is_active' => 1,
            'title' => 'Learn Laravel',
            'path' => 'uploads/photos/4.png'
        ]);
        $photo5 =Photo::create([
            'user_id' => 3,
            'category_id' => 3,
            'is_active' => 1,
            'title' => 'Learn Laravel',
            'path' => 'uploads/photos/5.png'
        ]);
        
        
        
    }
}
