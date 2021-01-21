<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'prenom'=>'Admin',
            'name' => 'Admin',
            'email'=> 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role_id' => '1',

        ]);

        DB::table('users')->insert([
            'prenom'=>'teacher',
            'name' => 'Teacher',
            'email'=> 'teacher@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role_id' => '2',

        ]);

        DB::table('users')->insert([
            'prenom'=>'dave',
            'name' => 'friquet',
            'email'=> 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'role_id' => '3',

        ]);


        // $faker = Factory::create('fr_FR');
        // for ($i = 0; $i < 40; $i++) {
        //     $users = new User();
        //     $users->prenom = $faker->firstName;
        //     $users->name = $faker->lastName;
        //     $users->email = $faker->unique()->safeEmail;
        //     $users->email_verified_at = now();
        //     $users->role_id = '2';
        //     $users->password = bcrypt('123456'); // password
        //     $users->remember_token = Str::random(10);
        //     $users->save();
        // }


    }
}

