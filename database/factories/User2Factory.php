<?php

namespace Database\Factories;

use App\Models\User2;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class User2Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User2::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'login' => $this->faker->unique()->userName,
            'password' => bcrypt('password'), // use bcrypt or hash to hash the password
            'km' => $this->faker->numberBetween(0, 1000),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
