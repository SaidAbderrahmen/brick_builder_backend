<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique->email(),
            'password' => $this->faker->password(),
            'gender' => \Arr::random(['male', 'female', 'other']),
            'weight' => $this->faker->randomFloat(2, 0, 9999),
            'height' => $this->faker->randomFloat(2, 0, 9999),
        ];
    }
}
