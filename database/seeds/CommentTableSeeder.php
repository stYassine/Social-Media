<?php

use Illuminate\Database\Seeder;

use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $comment_1 =Comment::create([
            'user_id' => 2,
            'post_type_id' => 1,
            'post_id' => 1,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        $comment_2 =Comment::create([
            'user_id' => 1,
            'post_type_id' => 1,
            'post_id' => 2,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        $comment_3 =Comment::create([
            'user_id' => 2,
            'post_type_id' => 2,
            'post_id' => 1,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        $comment_4 =Comment::create([
            'user_id' => 2,
            'post_type_id' => 2,
            'post_id' => 1,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        $comment_5 =Comment::create([
            'user_id' => 3,
            'post_type_id' => 1,
            'post_id' => 1,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        $comment_6 =Comment::create([
            'user_id' => 3,
            'post_type_id' => 1,
            'post_id' => 1,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        $comment_7 =Comment::create([
            'user_id' => 3,
            'post_type_id' => 2,
            'post_id' => 1,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        $comment_8 =Comment::create([
            'user_id' => 4,
            'post_type_id' => 2,
            'post_id' => 2,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        $comment_9 =Comment::create([
            'user_id' => 4,
            'post_type_id' => 2,
            'post_id' => 2,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        $comment_10 =Comment::create([
            'user_id' => 4,
            'post_type_id' => 2,
            'post_id' => 2,
            'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',
        ]);
        
        
        
    }
}
