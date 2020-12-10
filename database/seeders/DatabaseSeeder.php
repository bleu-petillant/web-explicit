<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\Resource;
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
       
        //Course::factory()->count(50)->create();
        //Resource::factory()->count(50)->create();
        User::factory()->count(100)->create();
    }
}
