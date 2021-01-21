<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = new Category();
        $categories->name = 'pdf';
        $categories->save();

        $categories = new Category();
         $categories->name = 'vidéo';
        $categories->save();

        $categories = new Category();
         $categories->name = 'podcast';

        $categories->save();

        $categories = new Category();
         $categories->name = 'article';
        $categories->save();
    }
}
