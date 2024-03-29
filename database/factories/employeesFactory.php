<?php

namespace Database\Factories;

use App\Models\employees;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class employeesFactory extends Factory
{
    protected $model = employees::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'company' => $this->faker->word(),
        ];
    }
}
