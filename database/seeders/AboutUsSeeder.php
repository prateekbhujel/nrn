<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aboutuses')->insert([
           'column_1' => 'Value 1',
                'column_1_description' => 'Description for column 1',
                'column_2' => 'Value 2',
                'column_2_description' => 'Description for column 2',
                'column_3' => 'Value 3',
                'column_3_description' => 'Description for column 3',
                'column_4' => 'Value 4',
                'column_4_description' => 'Description for column 4',
                'column_5' => 'Value 5',
                'column_5_description' => 'Description for column 5',
                'column_6' => 'Value 6',
                'column_6_description' => 'Description for column 6',
                'column_7' => 'Value 7',
                'column_7_description' => 'Description for column 7',
                'column_8' => 'Value 8',
                'column_8_description' => 'Description for column 8',
                'created_at' => Carbon::now()
        ]);

    }
}
