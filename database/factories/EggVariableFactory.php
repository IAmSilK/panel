<?php

namespace Database\Factories;

use Pterodactyl\Models\EggVariable;
use Illuminate\Database\Eloquent\Factories\Factory;

class EggVariableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EggVariable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'description' => $this->faker->sentence(),
            'env_variable' => strtoupper(str_replace(' ', '_', $this->faker->words(2, true))),
            'default_value' => $this->faker->colorName,
            'user_viewable' => 0,
            'user_editable' => 0,
            'rules' => 'required|string',
        ];
    }

    /**
     * Indicate that the egg variable is viewable.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function viewable(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'user_viewable' => 1,
            ];
        });
    }

    /**
     * Indicate that the egg variable is editable.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function editable(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'user_editable' => 1,
            ];
        });
    }
}