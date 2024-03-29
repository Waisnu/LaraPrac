<?php

namespace Database\Factories;

use App\Models\companies;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class companiesFactory extends Factory
{
    protected $model = companies::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => $this->faker->word(),
            'website' => $this->faker->word()
        ];
    }
}
