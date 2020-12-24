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
        return [
            'title' => $this->faker->sentence(2),
            'desc' => $this->faker->text(),
            'slug' => Str::slug($this->faker->sentence()),
            'image'=> 'https://picsum.photos/200/200?random=' .$this->faker->numberBetween($min = 1, $max = 75) ,
            'category_id' =>$this->faker->numberBetween($min = 1, $max = 4),
            'link'=>'https://www.youtube.com/watch?v=7X8II6J-6mU',
            'pdf'=>'pdf',
            'meta'=>$this->faker->word(),
            'alt'=>$this->faker->word(),
            'teacher_id' => $this->faker->numberBetween($min = 4, $max = 20),

        ];
    }
}
