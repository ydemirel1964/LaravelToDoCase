<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Developer;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Developer::create(['name' => 'DEV1', 'efficiency' => 1]);
        Developer::create(['name' => 'DEV2', 'efficiency' => 2]);
        Developer::create(['name' => 'DEV3', 'efficiency' => 3]);
        Developer::create(['name' => 'DEV4', 'efficiency' => 4]);
        Developer::create(['name' => 'DEV5', 'efficiency' => 5]);
    }
}
