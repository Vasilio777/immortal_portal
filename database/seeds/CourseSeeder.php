<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder {
    public function run()
    {
        Course::create([
            'ctitle' => 'Java',
            'cdesc' => 'Java — кроссплатформенный язык программирования с мощным набором библиотек практически на все случаи жизни.',
            'requirements' => 'хорошо разобраться с ООП, в java эта парадигма - основа языка (класы, интерфейсы, абстрактные класы); изучить базовые классы для того, чтоб при написании программы вы не тратили много времени на поиск (работа с файлами, с сетью, написание ГУИ, сортировки, работа с БД); освоить обработку ошибок и работу с потоками.',
            'forWhom' => 'Хотите стать java юниором с уклоном к веб - не проблема!',
            'image' => 'Java.png',
        ]);
        Course::create([
            'ctitle' =>  'C#',
            'cdesc' => 'Скоро',
            'image' => 'C#.png',
        ]);
        Course::create([
            'ctitle' => 'C# Starter',
            'cdesc' => 'Курс по C# Starter ДА это Курс по C# Starter',
            'image' => 'C# Starter.png',
        ]);
        Course::create([
            'ctitle' => '3Ds Max',
            'cdesc' => 'Скоро',
            'image' => '3Ds Max.png',

        ]);
        Course::create([
            'ctitle' => 'Unity3D',
            'cdesc' => 'Скоро',
            'image' => 'Unity3D.png',
        ]);
        Course::create([
            'ctitle' => 'Swift',
            'cdesc' => 'Скоро',
            'image' => 'Swift.png',
        ]);
        Course::create([
            'ctitle' => 'Linux',
            'cdesc' => 'Скоро',
            'image' => 'Linux.png',
        ]);
        Course::create([
            'ctitle' => 'Maya',
            'cdesc' => 'Скоро',
            'image' => 'Maya.png',
        ]);
        Course::create([
            'ctitle' => 'AutoCad',
            'cdesc' => 'Скоро',
            'image' => 'AutoCad.png',
        ]);
    }
}
