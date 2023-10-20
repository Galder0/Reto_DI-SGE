<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class DepartmentSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('departments')->insert([
            "depname"=>"Primer Departamento",
            "created_at"=>now(),
        ]);
        DB::table('departments')->insert([
            "depname"=>"Segundo Departamento",
            "created_at"=>now(),
        ]);
        DB::table('departments')->insert([
            "depname"=>"Tercer Departamento",
            "created_at"=>now(),
        ]);
    }
}
