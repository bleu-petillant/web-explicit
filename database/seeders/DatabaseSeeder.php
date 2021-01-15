<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usage;
use App\Models\Course;
use App\Models\Category;
use App\Models\Question;
use App\Models\Resource;
use App\Models\Reference;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {

      $this->call([

        RoleSeeder::class,
        AdminSeeder::class,
        CategoriesSeeder::class
    ]);
       $user = User::factory()->count(100)->create();
      $reference = Reference::factory()->count(35)->state(new Sequence(
                    ['private' => 0],
                    ['private' => 1],
                ))->create();

      $course = Course::factory()->count(10)->create();

      $course->each(function (Course $r) use ($reference) {
        $r->references()->attach(
            [
              'reference_id' => Reference::all()->random()->id,
              'course_id'=> Course::all()->random()->id
            ]
        );
    });
    $usage = Usage::factory()->count(6)->create();


  
        
    }
}
