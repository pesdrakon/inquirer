<?php

namespace Database\Factories;

use App\Models\Inquirer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InquirerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inquirer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key' => $this->faker->word,
            'title' => $this->faker->name
        ];
    }
}
