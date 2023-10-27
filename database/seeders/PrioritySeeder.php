<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('priorities')->insert([
            'name' => 'High',
            'order' => 1,
        ]);

        DB::table('priorities')->insert([
            'name' => 'Medium',
            'order' => 2,
        ]);

        DB::table('priorities')->insert([
            'name' => 'Low',
            'order' => 3,
        ]);

        DB::table('priorities')->insert([
            'name' => 'Critical',
            'order' => 4,
        ]);
    }
}
