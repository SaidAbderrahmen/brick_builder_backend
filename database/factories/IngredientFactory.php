<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingredient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'unit' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber(),
            'recepie_id' => \App\Models\Recepie::factory(),
        ];
    }
}
