<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Question;
use App\Models\Reference;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
        protected $model = Reference::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);
         $slug = Str::slug($title, '-');
        return [
            'title' =>$title,
            'desc' => $this->faker->text(),
            'slug' => $slug,
            'image'=> 'https://picsum.photos/200/200?random=' .$this->faker->numberBetween($min = 1, $max = 75) ,
            'category_id' =>$this->faker->numberBetween($min = 1, $max = 4),
            'link'=>'https://www.youtube.com/embed/_RDtBJPOsV8',
            'pdf'=>'pdf',
            'meta'=>$this->faker->word(),
            'alt'=>$this->faker->word(),
            'teacher_id' => $this->faker->numberBetween($min = 4, $max = 20),

        ];
    }
}
