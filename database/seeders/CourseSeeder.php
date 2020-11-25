<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Role;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $course = new Course();
            $course->title = $faker->word;
            $course->desc = $faker->sentence($nbWords = 10, $variableNbWords = true);
            $course->save();
        }

    }
}
