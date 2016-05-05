<?php

use Illuminate\Database\Seeder;
use App\Homework;

class HomeworkSeeder extends Seeder
{
    public function run()
    {
        Homework::create([
            'name' => 'Lalka',
            'homeworkOfLection' => '1',
//            'homeworkdesc' => 'PeaceAndRoll',
            'homeworkfile' => 'Lalka_Action.jpg'
        ]);
        Homework::create([
            'name' => 'Lalka',
            'homeworkOfLection' => '1',
            'homeworkfile' => 'Lalka_Actionn.jpg'
        ]);
    }
}

