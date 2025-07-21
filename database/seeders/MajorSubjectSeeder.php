<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('major_subject')->insert([
            ['major_id' => 1, 'subject_id' => 1],
            ['major_id' => 1, 'subject_id' => 2],
            ['major_id' => 1, 'subject_id' => 6],
            ['major_id' => 2, 'subject_id' => 1],
            ['major_id' => 2, 'subject_id' => 2],
            ['major_id' => 2, 'subject_id' => 6],
            ['major_id' => 2, 'subject_id' => 3],
            ['major_id' => 3, 'subject_id' => 2],
            ['major_id' => 3, 'subject_id' => 3],
            ['major_id' => 3, 'subject_id' => 4],
            ['major_id' => 1, 'subject_id' => 5],
            ['major_id' => 1, 'subject_id' => 6],
        ]);
    }
}
