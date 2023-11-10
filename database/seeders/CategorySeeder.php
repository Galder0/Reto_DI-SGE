<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            "name"=>"Reclamacion",
            "created_at"=>now(),
        ]);
        DB::table('categories')->insert([
            "name"=>"Fallo de maquinaria",
            "created_at"=>now(),
        ]);
        DB::table('categories')->insert([
            "name"=>"Fallo de software",
            "created_at"=>now(),
        ]);
    }
}
