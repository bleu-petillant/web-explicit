<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\Question;
use App\Models\Reference;
use App\Models\Resource;
use App\Models\Usage;
use App\Models\User;
use Illuminate\Database\Seeder;

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
       User::factory()->count(100)->create();
        Course::factory()->count(20)->create();
        Question::factory()->count(1)->create();
        Reference::factory()->count(25)->create();
        Usage::factory()->count(5)->create();
        
    }
}
