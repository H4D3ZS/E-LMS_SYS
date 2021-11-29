<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lesson;
use App\Photo;
use App\User;
use App\Student;
use App\Teacher;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$sBRVd1Vk0iFlhuVgpt.CeucI5b1.pQ73rsfjNrWbzQACksJ3AMjce', // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(Student::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'fname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'roll_no' =>trim($faker->randomElement(['F16MM27','F16MM30','F17MM12','F16MM11','F16MM32','F19MM27','F19MM27','F16MM22','F16MM23'])),
        'phone' => '03040738009',
        'address' =>  $faker->country,
        'cnic' =>  '3234234232',
        'semester' =>  $faker->numberBetween(1,8),
        'dept' =>  trim($faker->randomElement(['IT','CS','ENGLISH','URDU','BIOLOGY','ZOLOGY','CHEMISTRY','PHYSICS','MATH'])),
        'password' =>  '$2y$10$sBRVd1Vk0iFlhuVgpt.CeucI5b1.pQ73rsfjNrWbzQACksJ3AMjce',

    ];
});

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'salary' => $faker->numberBetween(100,3000),
        'phone' => '03040738009',
        'address' =>  $faker->country,
        'rank' =>  $faker->name,
        'teaching_semester' =>  '2,4,6,8',
        'dept' =>  trim($faker->randomElement(['IT','CS','ENGLISH','URDU','BIOLOGY','ZOLOGY','CHEMISTRY','PHYSICS','MATH'])),
        'password' =>  '$2y$10$sBRVd1Vk0iFlhuVgpt.CeucI5b1.pQ73rsfjNrWbzQACksJ3AMjce',
    ];
});
$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'title' =>  trim($faker->randomElement(['HTML','PHP','Laravel','How to learn english','How to start BIOLOGY test','Start career with Zology','CHEMISTRY Rules','Newton Rule','Algebra notes'])),
        'description' => $faker->name,
        'semester' => $faker->numberBetween(1,8),
        'department' => $faker->randomElement(['IT','CS','ENGLISH','URDU','BIOLOGY','ZOLOGY','CHEMISTRY','PHYSICS','MATH']),
        'file' =>  'test.png',
        'teacher_id' =>  $faker->numberBetween(1,8),
        'video_link' =>  "www.youtub.com/cdl",
    ];
});
$factory->define(Photo::class, function (Faker $faker) {
    return [
        'image' =>  $faker->image('public/uom/images',400,300, null, false)
    ];
});

