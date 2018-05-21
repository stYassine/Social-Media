<?php

use Illuminate\Database\Seeder;


use App\Article;


class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $article1 =Article::create([
            'user_id' => 2,
            'category_id' => 1,
            'is_active' => 1,
            'title' => 'Learn Laravel',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ]);
        $article2 =Article::create([
            'user_id' => 2,
            'category_id' => 1,
            'is_active' => 1,
            'title' => 'Learn Angular',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ]);
        $article3 =Article::create([
            'user_id' => 2,
            'category_id' => 2,
            'is_active' => 1,
            'title' => 'Learn JQuery',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ]);
        $article4 =Article::create([
            'user_id' => 3,
            'category_id' => 2,
            'is_active' => 1,
            'title' => 'Learn Android',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ]);
        $article5 =Article::create([
            'user_id' => 3,
            'category_id' => 3,
            'is_active' => 0,
            'title' => 'Learn RxJs',
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'
        ]);
        
        
        
    }
}
