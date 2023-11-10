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
            'name' => 'Alta',
            'order' => 15,
        ]);

        DB::table('priorities')->insert([
            'name' => 'Media',
            'order' => 10,
        ]);

        DB::table('priorities')->insert([
            'name' => 'Baja',
            'order' => 5,
        ]);

        DB::table('priorities')->insert([
            'name' => 'Crítica',
            'order' => 20,
        ]);
    }
}
