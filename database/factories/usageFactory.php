<?php

namespace Database\Factories;

use App\Models\Usage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class usageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {    $title = $this->faker->sentence(2);
         $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'desc' => $this->faker->text(),
            'slug' => $slug,
            'image'=> 'https://picsum.photos/200/200?random=' .$this->faker->numberBetween($min = 1, $max = 75) ,
            'link'=>'https://www.youtube.com/embed/_RDtBJPOsV8',
            'meta'=>$this->faker->word(),
            'alt'=>$this->faker->word(),
            'teacher_id' => $this->faker->numberBetween($min = 4, $max = 20),
        ];
    }
}
