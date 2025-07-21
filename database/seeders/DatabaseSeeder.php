<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MajorSeeder::class,
            SubjectSeeder::class,
        ]);
       $this->call([MajorSubjectSeeder::class]);

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // Set a default password
            ]
        );
    }
}
