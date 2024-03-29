<?php

namespace Database\Seeders;

use App\Models\companies;
use Illuminate\Database\Seeder;

class companiesSeeder extends Seeder
{
    public function run(): void
    {
      companies::factory(10)->create();
    }
}
