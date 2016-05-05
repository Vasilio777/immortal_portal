<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {
    public function run() {
        User::create([
            'name' => 'Admin',
            'email' => 'portal@mail.ru',
            'isPrepod' => '2',
            'password' => Hash::make('nimda'),
        ]);
        User::create([
            'name' => 'Papka',
            'email' => 'myemail@mail.ru',
            'isPrepod' => '1',
            'password' => Hash::make('papka'),
        ]);
        User::create([
            'name' => 'Lalka',
            'email' => 'lalkamail@mail.ru',
            'isPrepod' => '0',
            'password' => Hash::make('lalka')
        ]);
    }
}
