<?php

use Illuminate\Database\Seeder;

use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $message_1 =Message::create([
            'user_id' => 1,
            'sender_id' => 2,
            'body' => 'Lorem Lipsum Dolor Imit 1'
        ]);
        $message_2 =Message::create([
            'user_id' => 2,
            'sender_id' => 1,
            'body' => 'Lorem Lipsum Dolor Imit 2'
        ]);
        $message_3 =Message::create([
            'user_id' => 1,
            'sender_id' => 2,
            'body' => 'Lorem Lipsum Dolor Imit 3'
        ]);
        $message_4 =Message::create([
            'user_id' => 2,
            'sender_id' => 1,
            'body' => 'Lorem Lipsum Dolor Imit 4'
        ]);
        $message_5 =Message::create([
            'user_id' => 1,
            'sender_id' => 2,
            'body' => 'Lorem Lipsum Dolor Imit 5'
        ]);    
        
    }
    
}
