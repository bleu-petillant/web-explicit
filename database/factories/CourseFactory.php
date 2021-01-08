<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Course;
use App\Models\Category;
use App\Models\Resource;


use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $title = $this->faker->sentence();
            $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'desc' => $this->faker->text(),
            'slug' => $slug,
            'image'=>  'https://picsum.photos/200/200?random=' .$this->faker->numberBetween($min = 1, $max = 75) ,
            'alt'=>$this->faker->word(),
            'meta'=>$this->faker->word(),
            'teacher_id' => $this->faker->numberBetween($min = 4, $max = 20),
        ];
    }


}
