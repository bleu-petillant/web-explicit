<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\Resources;
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
        AdminSeeder::class

    ]);
        Category::factory()->count(20)->create();
        Course::factory()->count(50)->create();
        Resources::factory()->count(50)->create();
        User::factory()->count(100)->create();
    }
}
