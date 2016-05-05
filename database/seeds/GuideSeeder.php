<?php

use Illuminate\Database\Seeder;
use App\Guide;

class GuideTableSeeder extends Seeder
{
    public function run()
    {
        Guide::create([
            'idaddlec' => '1',
            'addtitle' => 'Лекция 1. Encoding.xps',
        ]);
        Guide::create([
            'idaddlec' => '2',
            'addtitle' => '001 Знакомство с языком C# (Presentation).pdf',
        ]);
        Guide::create([
            'idaddlec' => '2',
            'addtitle' => '001 Знакомство с языком C#.pdf',
        ]);
        Guide::create([
            'idaddlec' => '3',
            'addtitle' => '002 Машинная математика.Переменные и типы данных.(Presentation).pdf',
        ]);
        Guide::create([
            'idaddlec' => '3',
            'addtitle' => '002 Машинная математика.Переменные и типы данных.pdf',
        ]);
        Guide::create([
            'idaddlec' => '4',
            'addtitle' => '003 Переменные и типы данных (Presentation).pdf',
        ]);
        Guide::create([
            'idaddlec' => '4',
            'addtitle' => '003 Переменные и типы данных.pdf',
        ]);
        Guide::create([
            'idaddlec' => '5',
            'addtitle' => '004 Условные конструкции (Presentation).pdf',
        ]);
        Guide::create([
            'idaddlec' => '5',
            'addtitle' => '004 Условные конструкции.pdf',
        ]);
        Guide::create([
            'idaddlec' => '6',
            'addtitle' => '005 Логические и побитовые операции (Presentation).pdf',
        ]);
        Guide::create([
            'idaddlec' => '6',
            'addtitle' => '005 Логические и побитовые операции.pdf',
        ]);
        Guide::create([
            'idaddlec' => '7',
            'addtitle' => '006 Циклические  конструкции (Presentation).pdf',
        ]);
        Guide::create([
            'idaddlec' => '7',
            'addtitle' => '006 Циклические  конструкции.pdf',
        ]);
        Guide::create([
            'idaddlec' => '8',
            'addtitle' => '007 Методы (Presentation).pdf',
        ]);
        Guide::create([
            'idaddlec' => '8',
            'addtitle' => '007 Методы.pdf',
        ]);
        Guide::create([
            'idaddlec' => '9',
            'addtitle' => '008 Методы (Presentation).pdf',
        ]);
        Guide::create([
            'idaddlec' => '9',
            'addtitle' => '008 Методы.pdf',
        ]);
        Guide::create([
            'idaddlec' => '10',
            'addtitle' => '009 Массивы (Presentation).pdf',
        ]);
        Guide::create([
            'idaddlec' => '10',
            'addtitle' => '009 Массивы.pdf',
        ]);
    }
}
