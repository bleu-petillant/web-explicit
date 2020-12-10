<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Resources;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ResourcesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resources::class;

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

        ];
    }
}
