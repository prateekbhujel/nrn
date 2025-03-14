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
            [
                'organization_name' => 'Tech Innovators',
                'organization_motto' => 'Innovate, Create, Elevate',
                'organization_email' => 'contact@techinnovators.com',
                'organization_number' => '+1234567890',
                'about_organisation' => 'A leading company in tech innovations.',
                'organization_address' => '123 Innovation Street, Silicon Valley',
                'about_organization' => 'Tech Innovators is dedicated to pushing the boundaries of technology.',
                'created_at' => Carbon::now()
            ],
        ]);

    }
}
