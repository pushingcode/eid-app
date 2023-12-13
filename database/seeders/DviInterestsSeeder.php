<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;

class DviInterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $interests = [
            ['name' => 'Science'],
            ['name' => 'Human Sciences'],
            ['name' => 'Health Sciences'],
            ['name' => 'Service to the Individual'],
            ['name' => 'Service to Society'],
            ['name' => 'Engineering'],
            ['name' => 'Agricultural'],
            ['name' => 'Livestock'],
            ['name' => 'Social Communication'],
            ['name' => 'Military Arts and Sports'],
            ['name' => 'Economics'],
            ['name' => 'Commerce'],
            ['name' => 'Administration'],
            ['name' => 'Arts'],
            ['name' => 'Music - Creation'],
            ['name' => 'Music - Performance'],
            ['name' => 'Literature'],
            ['name' => 'Theater'],
        ];

        foreach ($interests as $interest) {
            Interest::create($interest);
        }
    }
}
