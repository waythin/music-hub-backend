<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Instrument;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        Instrument::create([
            'name'                  => 'guitar',
           
        ]);
        Instrument::create([
            'name'                  => 'piano',

        ]);
        Instrument::create([
            'name'                  => 'drum',

        ]);
    }
}
