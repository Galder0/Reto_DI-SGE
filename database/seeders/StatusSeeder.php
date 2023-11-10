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
            "created_at"=>now()
        ]);
        DB::table('statuses')->insert([
            'name' => 'Asignada',
            "created_at"=>now()
        ]);
        DB::table('statuses')->insert([
            'name' => 'Escalada',
            "created_at"=>now()
        ]);
        DB::table('statuses')->insert([
            'name' => 'En Curso',
            "created_at"=>now()
        ]);
        DB::table('statuses')->insert([
            'name' => 'Retenida',
            "created_at"=>now()
        ]);
        DB::table('statuses')->insert([
            'name' => 'Resuelta',
            "created_at"=>now()
        ]);
        DB::table('statuses')->insert([
            'name' => 'Cerrada',
        ]);
    }
}
