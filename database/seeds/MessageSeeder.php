<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessageTableSeeder extends Seeder
{
    public function run()
    {
        Message::create([
            'name' => 'Vasiliy',
            'email' => 'fakemail@email.ru',
            'messagesOfLection' => '1',
            'message' => 'Давайте жить дружно',

        ]);
        Message::create([
            'name' => 'Anatole',
            'email' => 'forcemail@email.ru',
            'messagesOfLection' => '2',
            'message' => 'А давайте'
        ]);
    }
}
