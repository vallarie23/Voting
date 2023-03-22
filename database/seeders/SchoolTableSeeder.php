<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schools;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schools::create([
            'name' => 'School of computing'
        ]);

        Schools::create([
            'name' => 'School of business and economics'
        ]);

        Schools::create([
            'name' => 'School of arts and social sciences'
        ]);

        Schools::create([
            'name' => 'School of medicine'
        ]);

        Schools::create([
            'name' => 'School of natural sciences'
        ]);
    }
}
