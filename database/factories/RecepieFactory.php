<?php

namespace Database\Factories;

use App\Models\Recepie;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecepieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recepie::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'type' => 'breakfast',
            'energie' => $this->faker->randomNumber(2),
            'sugar' => $this->faker->randomNumber(2),
            'calories' => $this->faker->randomNumber(2),
            'fat' => $this->faker->randomNumber(2),
            'serves' => $this->faker->randomNumber(0),
            'time' => $this->faker->randomNumber(0),
            'instructions' => $this->faker->text(),
            'picture' => $this->faker->text(),
        ];
    }
}
