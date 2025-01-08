<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'                  => 'Instructor',
            'email'                 => 'instructor@gmail.com',
            'role'                 => 'instructor',
            // 'phone'                 => '01700000000',
            'password'              => bcrypt('12345678'),
           
        ]);
        User::create([
            'name'                  => 'Student',
            'email'                 => 'student@gmail.com',
            'role'                 => 'student',
            // 'phone'                 => '01710000001',
            'password'              => bcrypt('12345678'),
        ]);
    }
}
