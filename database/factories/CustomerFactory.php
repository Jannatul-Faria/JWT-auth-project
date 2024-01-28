<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
     protected $model= Customer::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' =>  $this->faker->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            "user_id"=>User::factory(),
        ];
    }
}
