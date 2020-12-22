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
        return [
            'title' => $this->faker->sentence(),
            'desc' => $this->faker->text(),
            'slug' => Str::slug($this->faker->sentence()),
            'image'=> $this->faker->imageUrl($width = 200, $height = 200),
            'alt'=>$this->faker->word(),
            'video' =>'public/storage/course/video/dj_1608552768.mp4',
            'meta'=>$this->faker->word(),
            'teacher_id' => $this->faker->numberBetween($min = 4, $max = 20),
        ];
    }


}
