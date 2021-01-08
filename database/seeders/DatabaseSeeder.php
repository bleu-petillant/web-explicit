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
       Reference::factory()->count(45)->state(new Sequence(
                    ['private' => 0],
                    ['private' => 1],
                ))->create();

      $course = Course::factory()->count(35)->create();


        //Question::factory()->count(1)->create();
  
        
    }
}
