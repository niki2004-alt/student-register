<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('students')->insert([
            'id' => 1, // 👈 This ensures stu001 gets ID = 1
            'number' => 'stu001',
            'name' => 'John Doe',
            'gender' => 'Male',
            'year' => '1st',
            'major_id' => 1, // Make sure major_id 1 exists
        ]);
    }
}
