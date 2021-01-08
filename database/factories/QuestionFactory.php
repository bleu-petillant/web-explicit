<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence(1),
            'course_id' => $this->faker->numberBetween($min = 1, $max = 20),
            'video' =>'public/storage/course/video/dj_1608552768.mp4',
            'question_position'=>1,
            'indice'=>$this->faker->sentence(5),

        ];
    }
}
