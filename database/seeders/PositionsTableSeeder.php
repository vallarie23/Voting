<?php

namespace Database\Seeders;

use App\Models\Positions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Positions::create([
            'name' => 'Female Representative'
        ]);

        Positions::create([
            'name' => 'Male Representative'
        ]);

        Positions::create([
            'name' => 'Resident'
        ]);

        Positions::create([
            'name' => 'Non-resident'
        ]);
    }
}
