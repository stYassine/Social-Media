<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $cat1 =Category::create([
            'name' => 'Web'
        ]);
        $cat2 =Category::create([
            'name' => 'Mobile'
        ]);
        $cat3 =Category::create([
            'name' => 'Art'
        ]);
        
        
    }
}
