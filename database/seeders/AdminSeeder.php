<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('123456'),
            'role_id' => '1',

        ]);

        DB::table('users')->insert([
            'prenom'=>'teacher',
            'name' => 'Teacher',
            'email'=> 'teacher@test.com',
            'password' => Hash::make('123456'),
            'role_id' => '2',

        ]);

        DB::table('users')->insert([
            'prenom'=>'dave',
            'name' => 'friquet',
            'email'=> 'test@test.com',
            'password' => Hash::make('123456'),
            'role_id' => '3',

        ]);
    }
}
