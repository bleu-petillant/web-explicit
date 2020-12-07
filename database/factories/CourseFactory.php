<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Resources;
use App\Models\Tags;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

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
        return [
            'title' => $this->faker->sentence(),
            'desc' => $this->faker->text(),
            'slug' => Str::slug($this->faker->sentence()),
            'image'=> $this->faker->imageUrl($width = 200, $height = 200),
            'category_id' => Category::factory(),
            'resources_id' => Resources::factory(),
            'user_id' => $this->faker->numberBetween($min = 4, $max = 20),
        ];
    }


}
