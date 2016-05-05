<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(LectionTableSeeder::class);
        $this->call(GuideTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        $this->call(HomeworkSeeder::class);
    }
}
