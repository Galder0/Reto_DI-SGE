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
            "depname"=>"Departamento de Ventas",
            "created_at"=>now(),
        ]);
        DB::table('departments')->insert([
            "depname"=>"Departamento de Logística",
            "created_at"=>now(),
        ]);
        DB::table('departments')->insert([
            "depname"=>"Departamento IT",
            "created_at"=>now(),
        ]);
        DB::table('departments')->insert([
            "depname"=>"Departmento RRHH",
            "created_at"=>now(),
        ]);
    }
}
