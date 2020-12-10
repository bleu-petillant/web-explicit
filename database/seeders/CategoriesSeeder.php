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
        $categories->color = 'pdf-color';
        $categories->save();

        $categories = new Category();
         $categories->name = 'video';
        $categories->color = 'video-color';
        $categories->save();

        $categories = new Category();
         $categories->name = 'podcast';
        $categories->color = 'podcast-color';
        $categories->save();

        $categories = new Category();
         $categories->name = 'articles';
        $categories->color = 'articles-color';
        $categories->save();
    }
}
