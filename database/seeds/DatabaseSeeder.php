<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Student;
use App\Teacher;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 5)->create();
        // factory(App\Student::class, 5)->create();
        factory(App\Teacher::class, 2)->create();
        // factory(App\Lesson::class, 1)->create();
        // factory(App\Photo::class, 5)->create();
    }
}
