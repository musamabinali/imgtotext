<?php

namespace Database\Factories;

use App\Models\BlogDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'short_description' => $this->faker->paragraph(),
            'long_description' => $this->faker->paragraph(5)
        ];
    }
}
