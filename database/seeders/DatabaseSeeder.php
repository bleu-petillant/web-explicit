<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Teacher;
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

        CourseSeeder::class,
        RoleSeeder::class,
        AdminSeeder::class


    ]);

       
        User::factory(10)->create();
    }
}
