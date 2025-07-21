<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('majors')->insert([
            ['name' => 'Computer Science'],
            ['name' => 'Information Technology'],
            ['name' => 'Business Administration'],
            
        ]);
    }
}
