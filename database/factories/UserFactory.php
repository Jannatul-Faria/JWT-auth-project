<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {

        return [
            'firstName' => $this->faker->name,
            'lastName' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            'password' => $this->faker->password,

        ];
    }
}
