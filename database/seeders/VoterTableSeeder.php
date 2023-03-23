<?php

namespace Database\Seeders;

use App\Models\Voters;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Voters::create([
            'school_id' =>'1',
            'name' => 'Vallary Atieno',
            'regno' => 'SIT/B/01-5668/2020',
            'Gender' => 'Female',
            'Phone' =>'0798635432',
           'year_of_study' => '2nd',
           'residence'=>'Resident'
        ]);

        Voters::create([
            'school_id'=>'1',
            'name' => 'Marcus ben',
            'regno' => 'com/b/01-5668/2020',
            'Gender' => 'Male',
            'Phone'=>'0728997930',
            'year_of_study' =>'1st',
            'residence'=>'Non-Resident'
        ]);

        Voters::create([
            'school_id'=>'1',
            'name' => 'Latifah ngunjiri',
            'regno' => 'Com/B/01-5668/2020',
            'Gender' => 'Female',
            'Phone' =>'0722226134',
            'year_of_study' =>'3rd',
            'residence'=>'Resident'
        ]);

        Voters::create([
            'school_id'=>'1',
            'name' => 'James reeds',
            'regno' => 'SIK/B/01-98765/2020',
            'Gender' => 'Female',
            'Phone'=>'0765432109',
            'year_of_study' => '2nd',
            'residence'=>'Non-Resident'
        ]);

        Voters::create([
            'school_id'=>'1',
            'name' => 'Nicholas seeds',
            'regno' => 'Ets/B/01-98765/2020',
            'Gender' => 'Male',
            'Phone'=>'0715614280',
            'year_of_study' => '1st',
            'residence'=>'Resident'
        ]);
        
        
    }
    }

