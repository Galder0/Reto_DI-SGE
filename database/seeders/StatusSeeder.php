<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'name' => 'Sin Asignar',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Asignada',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Escalada',
        ]);
        DB::table('statuses')->insert([
            'name' => 'En Curso',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Retenida',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Resuelta',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Cerrada',
        ]);
    }
}
