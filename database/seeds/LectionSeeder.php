<?php

use Illuminate\Database\Seeder;
use App\Lection;

class LectionTableSeeder extends Seeder
{
    public function run()
    {
        Lection::create([
            'idcourse' => '1',
            'ltitle' => 'IDE_Mac.mp4',
            'ldesc' => 'Лекция написана простым и доступным языком, без книжной зауми и академичности. При этом, она содержит минимум воды — все кратко и по делу.',
        ]);
        Lection::create([
            'idcourse' => '3',
            'ltitle' => 'Урок 1. Знакомство с языком C#.mkv',
            'ldesc' => 'C# (произносится си шарп) — объектно-ориентированный язык программирования. Разработан в 1998—2001 годах группой инженеров под руководством Андерса Хейлсберга в компании Microsoft как язык разработки приложений для платформы Microsoft .NET и впоследствии был стандартизирован как ECMA334 и ISO/IEC 23270.',
        ]);
        Lection::create([
            'idcourse' => '3',
            'ltitle' => 'Урок 2. Машинная математика и системы исчисления.mkv',
            'ldesc' => 'Машинная математика. Системы счисления.',
        ]);
        Lection::create([
            'idcourse' => '3',
            'ltitle' => 'Урок 3. Переменные и типы данных.mkv',
            'ldesc' => 'C# (произносится си шарп) — объектно-ориентированный язык программирования. Разработан в 1998—2001 годах группой инженеров',
        ]);
        Lection::create([
            'idcourse' => '3',
            'ltitle' => 'Урок 4. Условные конструкции.mkv',
            'ldesc' => 'под руководством Андерса Хейлсберга',
        ]);
        Lection::create([
            'idcourse' => '3',
            'ltitle' => 'Урок 5. Логические операции.mkv',
            'ldesc' => 'в компании Microsoft',
        ]);
        Lection::create([
            'idcourse' => '3',
            'ltitle' => 'Урок 6. Циклические конструкции.mkv',
            'ldesc' => 'как язык разработки приложений',
        ]);
        Lection::create([
            'idcourse' => '3',
            'ltitle' => 'Урок 7. Методы.mkv',
            'ldesc' => 'для платформы Microsoft .NET',
        ]);
        Lection::create([
            'idcourse' => '3',
            'ltitle' => 'Урок 8. Методы. Рекурсия.mkv',
            'ldesc' => 'и впоследствии был стандартизирован',
        ]);
        Lection::create([
            'idcourse' => '3',
            'ltitle' => 'Урок 9. Массивы.mkv',
            'ldesc' => 'как ECMA334 и ISO/IEC 23270.',
        ]);
    }
}
