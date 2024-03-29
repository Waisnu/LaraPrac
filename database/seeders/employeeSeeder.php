<?php

namespace Database\Seeders;

use App\Models\companies;
use App\Models\employees;
use Illuminate\Database\Seeder;

class employeeSeeder extends Seeder
{
    public function run(): void
    {
        // Retrieve all company IDs
        $companyIds = companies::pluck('id');

        // Create 10 employees, associating each one with a random company
        for ($i = 0; $i < 10; $i++) {
            employees::factory()->create([
                'company' => $companyIds->random(),
            ]);
        }
    }
}
